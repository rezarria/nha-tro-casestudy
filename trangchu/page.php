<div class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-title">
                <h2>New Products</h2>
            </div> <!-- /.section -->
        </div> <!-- /.row -->
        <div class="row">
            <?php
            include_once __DIR__ . "/../dao/PostDAO.php";
            include_once __DIR__ . "/../dao/MotelDAO.php";
            include_once __DIR__ . "/../model/MotelModel.php";
            $dao = new PostDAO();
            $motelDAO = new MotelDAO();
            $page = 0;
            if (key_exists("page", $_GET)) {
                $page = $_GET["page"];
            }
            $data = $dao->page($page, 10);
            foreach ($data as $key => $value) {
                $motel = new MotelModel();
                $motelDAO->load($motel, $value->MotelID);
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img style="height: 300px; object-fit: contain;" src="<?php echo $motel->images ?>" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="<?php echo "detail.php?id=$value->ID" ?>">
                                    <?php echo $value->Title ?>
                                </a></h5>
                            <span class="price">
                                <?php echo $motel->price ?> vnd
                            </span>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                <?php
            }
            ?>
        </div> <!-- /.row -->
        <?php
        include_once "./pagination.php";
        ?>
    </div> <!-- /.container -->
</div> <!-- /.content-section -->