<?php


//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methonds: DELETE');
header('Access-Control-Allow-HEADERS: Access-Control-Allow-HEADERS, Content-Type, Access-Control-Allow-Methonds,Authorization, X-Requested-With' );

//initializing api
include_once('../cores/initialize.php');

//intantiate post 
$post = new Post($db);

//get posted data
$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;


//create post
if($post->delete()){
    
    echo json_encode(
        array('message' => 'post delete')
    );

}else{
    echo json_encode(
        
            array('message' => 'post not deleted')
        
    );
}


?>