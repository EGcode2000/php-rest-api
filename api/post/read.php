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

$result = $post->read(); 
$rowCount = $result->rowCount();

if ($rowCount > 0){
    $posts_arr=[];
    $posts_arr['data']=[];

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = [
            'id' => $id,
            'title' => $title,
            'body' => htmlspecialchars(html_entity_decode($body), ENT_QUOTES, 'UTF-8'),
            'author' => $author,
            'category_id'=> $category_id,
            'category_name'=> $category_name
        ];
        array_push($posts_arr['data'],$post_item);
    }

    echo json_encode($posts_arr);
}else{
    //no post
    echo json_encode([
        'message' => 'no posts found'
    ]);

}
?>