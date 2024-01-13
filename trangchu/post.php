<?php
$id = 0;
if (key_exists("id", $_GET)) {
    $id = $_GET["id"];
}
include_once __DIR__ . "/../dao/PostDAO.php";
include_once __DIR__ . "/../model/PostModel.php";
include_once __DIR__ . "/../dao/MotelDAO.php";
include_once __DIR__ . "/../model/MotelModel.php";

$postDAO = new PostDAO();
$motelDAO = new MotelDAO();
$post = new PostModel();
$motel = new MotelModel();
$postDAO->load($post, $id);
$motelDAO->load($motel, $post->MotelID);
?>

<div class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="product-image">
                    <img src="<?php echo $motel->images ?>" alt="">
                </div> <!-- /.product-image -->
                <div class="product-information">
                    <h2><?php echo $post->Title ?></h2>
                    <p><?php echo $post->Content ?></p>
                    <p class="product-infos">
                        <span>Price: <?php echo $motel->price ?></span>
                    </p>
                    <ul class="product-buttons">
                        <li>
                            <a href="order.php?id=<?php echo $motel->ID ?>" class="main-btn">Đặt ngay</a>
                        </li>
                    </ul>
                </div> <!-- /.product-information -->
            </div> <!-- /.col-md-8 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.content-section -->