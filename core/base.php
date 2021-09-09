<?php
function conn(){
    return mysqli_connect("localhost", "root","","blog");
}

$info = array (
    "name" => "MyBlog",
    "short" => "myblog",
    "description" => "my first blog project"
);

$role = ["Admin", "Editor", "User"];

$url = "http://{$_SERVER['HTTP_HOST']}/blog";

date_default_timezone_set ('Asia/Yangon');