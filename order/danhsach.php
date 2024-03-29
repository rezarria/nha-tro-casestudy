<?php
include_once __DIR__ . '/../components/head.php';
?>

<div class="container">
    <div class="row my-3">
        <div class="col">
            <a href="tao.php" class="btn btn-primary">Tạo</a>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <?php
                        include_once __DIR__ . '/../dao/OrderDAO.php';
                        include_once __DIR__ . '/../dao/UserDAO.php';
                        include_once __DIR__ . '/../dao/MotelDAO.php';
                        $db = new OrderDAO();
                        $userDAO = new OrderDAO();
                        $motelDAO = new OrderDAO();
                        $data = $db->load_all();
                        ?>
                        <tbody>
                            <?php
                            foreach ($data as $key => $value) {
                                $user = new UserModel();
                                $motel = new MotelModel();
                                $userDAO->load($user, $value->UserID);
                                $motelDAO->load($motel, $value->MotelID);
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $key ?>
                                    </th>
                                    <td>
                                        <?php echo "$user->Name đã đặt $motel->title" ?>
                                    </td>
                                    <td>
                                        <?php echo $value->MotelID ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="sua.php?id=<?php echo $value->ID ?>">Sửa</a>
                                        <a class="btn btn-danger" href="xoa.php?id=<?php echo $value->ID ?>">Xóa</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . '/../components/footer.php';
?>