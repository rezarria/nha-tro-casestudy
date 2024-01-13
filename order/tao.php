<?php
$msg = null;
switch ($_SERVER["REQUEST_METHOD"]) {
    case 'POST':
        include_once __DIR__ . '/../model/PostModel.php';
        include_once __DIR__ . '/../dao/PostDAO.php';
        $db = new PostDAO();
        $post = PostModel::fromForm([]);
        $db->save($post);
        header('location:danhsach.php');
        exit(301);
    default:
        break;
}

include_once __DIR__ . '/../components/head.php';

?>

<?php
if ($msg) {
    ?>
    <h2 style="color:red;">
        <?php echo $msg; ?>
    </h2>
    <?php
}
?>

<div class="container">
    <h1>Thêm bài viết</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="title" name="Title">
        </div>
        <div class="mb-3">
            <label for="MotelID">Trọ</label>
            <select class="form-select" name="MotelID" id="MotelID" aria-label="Default select example">
                <option selected></option>
                <?php
                include_once __DIR__ . '/../dao/MotelDAO.php';
                $motelDAO = new MotelDAO();
                $page = $_GET['page'];
                if (is_null($page))
                    $page = 0;
                $data = $motelDAO->load_all();
                foreach ($data as $key => $value) {
                    ?>
                    <option value="<?php echo $value->ID ?>">
                        <?php echo $value->title ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea id="editor" name="Content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" href="danhsach.php" class="btn btn-danger">Quay lại</a>
    </form>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"
        integrity="sha512-6JR4bbn8rCKvrkdoTJd/VFyXAN4CE9XMtgykPWgKiHjou56YDJxWsi90hAeMTYxNwUnKSQu9JPc3SQUg+aGCHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: '#editor'
        });
    </script>

</div>


<?php
include_once __DIR__ . '/../components/footer.php';
?>