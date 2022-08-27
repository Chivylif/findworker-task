<?php
  //Include  Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../configure/Database.php';
include_once '../../models/Comment.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate comment object
$comment = new Comment($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
$comment->comment = $data->comment;
// $comment->book_id = $data->book_id;

// Get Book id
$comment->book_id = isset($_GET['id']) ? $_GET['id'] : die();

// Create post
if ($comment->comment != null) {
    if ($comment->create()) {
        echo json_encode(
            array('message' => 'Comment Created Successfully')
        );
    }
}
else {
    echo json_encode(
        array('message' => 'Comment Not Created Successfully')
    );
}

?>