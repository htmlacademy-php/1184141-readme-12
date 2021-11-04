<?php

require_once("functions.php");
require_once("data.php");

$page_content = include_template ('main.php', [
    "posts" => $posts
]);

$layout_content = include_template ('layout.php', [
    "title" => "readme: популярное",
    "content" => $page_content,
    "is_auth" => $is_auth,
    "user_name" => $user_name
]);

print($layout_content);
