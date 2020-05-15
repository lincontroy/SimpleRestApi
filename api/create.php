<?php


//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methonds: POST');
header('Access-Control-Allow-HEADERS: Access-Control-Allow-HEADERS, Content-Type, Access-Control-Allow-Methonds,Authorization, X-Requested-With' );

//initializing api
include_once('../cores/initialize.php');

//intantiate post 
$post = new Post($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));
 
$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;


//create post
if($post->create()){
    
    echo json_encode(
        array('message' => 'post created')
    );

}else{
    echo json_encode(
        
            array('message' => 'post not created')
        
    );
}







?>