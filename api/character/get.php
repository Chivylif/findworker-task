<?php
// Add the Headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');

// include_once '../../configure/Database.php';
include_once '../../models/Character.php';

$character = new Character();

// Get Book id
$id = isset($_GET['id']) ? $_GET['id'] : die();
$name = isset($_GET['name']) ? $_GET['name'] : null;
$gender = isset($_GET['gender']) ? $_GET['gender'] : null;
$sort = isset($_GET['sort']) ? $_GET['sort'] : null;

//Get books
$data = $character->get_book_characters($id);

//Declare a book array
$character_arr = array();

$characters = $data['characters'];
$char_count = count($characters);

for ($i = 0; $i < strlen($characters) $i++) {
    $url = $characters[$i];
    $id = $character->get_character_id($url);
    $res = $character->get_characters($url);

    $character_item = array(
        'id' => $id,
        'name' => $res["name"],
        'gender' => $res['gender'],
        'born' => $res['born'],
        'character_count' => $char_count
    );
    
    //Push the book to the book array
    array_push($character_arr, $character_item);
}

//Sort the characters according to name
if ($name != null) {
    usort($character_arr, function($a, $b) {
        return $a['name'] <=> $b['name'];
    });
}

//Sort the characters according to gender
if ($gender != null) {
    usort($character_arr, function($a, $b) {
        return $a['gender'] <=> $b['gender'];
    });
}

//Filter the characters by to gender
$sorted = array();
if ($sort != null) {
    foreach ($character_arr as $arr) {
        if (strtolower($arr['gender']) == strtolower($sort)) {
            array_push($sorted, $arr);
        }
    }
    // Turn to JSON & output
    echo json_encode($sorted);
}else {
    // Turn to JSON & output
    echo json_encode($character_arr);
}

?>