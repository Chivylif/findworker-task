<?php

// Add the Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../configure/Database.php';
include_once '../../models/Comment.php';

//Instantiate database and connect
$database = new Database();
$db = $database->connect();

//Instantiate a new comment object
$com = new Comment($db);

// Get Book id
$com->book_id = isset($_GET['id']) ? $_GET['id'] : die();

//Get the book comments from db
$result = $com->get_book_comments();

$row_count = $result->rowCount();
if ($row_count > 0) {
    $comment_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $comment_post = array(
            'id' => $id,
            'comment' => html_entity_decode($comment),
            'book_id' => $book_id
        );

        array_push($comment_arr, $comment_post);
    }

    echo json_encode($comment_arr);
}
else {
    echo json_encode(
        array(
            'message' => 'No comment was found'
        )
    );
}

?>