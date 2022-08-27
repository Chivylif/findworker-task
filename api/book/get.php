<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../models/Book.php';
include_once '../../configure/Database.php';
include_once '../../models/Comment.php';

//Instantiate a new book object
$book = new Book();

//Instantiate a new db object
$database = new Database();
$db = $database->connect();

//Instantiate a new comment object
$com = new Comment($db);

//Get books
$result = $book->get_books();

//Declare a book array
$book_arr = array();

$release_date = isset($_GET['sort']) ? $_GET['sort'] : null;

foreach ($result as $data) {
    $temp_id = "";
    $url = $data["url"];

    for ($i = 0; $i < strlen($url); $i++) {
        //$temmp_arr = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $temp_arr = "0123456789";

        if (str_contains($temp_arr, $url[$i])) {
            $temp_id = $temp_id . $url[$i];
        }
    }

    //Get the comment count for the book from db
    $count = $com->get_book_comment_count((int)$temp_id);

    $book_item = array(
        'id' => (int)$temp_id,
        'name' => $data["name"],
        'authors' => $data['authors'],
        'isbn' => $data['isbn'],
        'released' => $data['released'],
        'comment_count' => $count
    );

    //Push the book to the book array
    array_push($book_arr, $book_item);
}

//Sort the characters according to release date
if ($release_date != null) {
    usort($book_arr, function($a, $b) {
        return $a['released'] <=> $b['released'];
    });
}

//Convert to json
echo json_encode($book_arr);
// print_r($book_arr);

?>