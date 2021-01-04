<?php
// DB credentials.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'riohotel');
// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

function con()
{
    return new mysqli("localhost", "root", "", "riohotel");
}

function insert_img($title, $folder, $image)
{
    $con = con();
    $con->query("insert into tblslider (title, folder,src,created_at) value (\"$title\",\"$folder\",\"$image\",NOW())");
}

function get_imgs()
{
    $images = array();
    $con = con();
    $query = $con->query("select * from tblslider order by created_at desc");
    while ($r = $query->fetch_object()) {
        $images[] = $r;
    }
    return $images;
}

function get_img($id)
{
    $image = null;
    $con = con();
    $query = $con->query("select * from tblslider where id=$id");
    while ($r = $query->fetch_object()) {
        $image = $r;
    }
    return $image;
}

function del($id)
{
    $con = con();
    $con->query("delete from tblslider where id=$id");
}
