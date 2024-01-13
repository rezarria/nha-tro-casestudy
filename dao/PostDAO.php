<?php
include_once __DIR__ . "/DB.php";
include_once __DIR__ . "/../model/PostModel.php";
class PostDAO extends DB
{
    public function __construct()
    {
        parent::__construct("GTPT", "Post");
    }

    public function load_all()
    {
        $data = parent::load_all();
        return array_map(fn($i) => PostModel::fromResult($i), $data);
    }

    public function remove(int $id)
    {
        parent::create_remove("`ID` = $id");
    }

    public function page(int $page, int $size)
    {
        return array_map(fn($i) => PostModel::fromResult($i), parent::create_page($page, $size, "ORDER BY created_at DESC"));
    }
}
?>