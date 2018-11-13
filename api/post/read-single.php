<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();
var_dump($db);
//instantiate Post and connect
$post = new Post($db); 
$getId = isset($_GET["id"])? (htmlspecialchars((int)$_GET["id"])): die();
$post->id = $getId;
$result = $post->readSingle(); 

if ($post->title != null){
    $posts_arr['data']=[];
    $post_item = [
        'id' => $post->id,
        'title' => $post->title,
        'body' => htmlspecialchars(html_entity_decode($post->body), ENT_QUOTES, 'UTF-8'),
        'author' => $post->author,
        'category_id'=> $post->category_id,
        'category_name'=> $post->category_name
    ];
    array_push($posts_arr['data'],$post_item);
    echo json_encode($posts_arr);
}else{
    //no post
    echo json_encode([
        'message' => 'no posts found'
    ]);

}
?>