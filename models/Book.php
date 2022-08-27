<?php
class Book {
    //Book Properties
    public $id;
    public $name;
    public $authors;
    public $isbn;
    public $released;
    public $comment_count;

    //Book constructor
    public function __construct() {

    }

    //Get Books from datasource API "https://www.anapioficeandfire.com/api/books"
    public function get_books() {

        //Initiate the curl call
        $curl = curl_init();
        $url = "https://www.anapioficeandfire.com/api/books";

        //Setup the curl 
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //Store the response to a variable
        $response = curl_exec($curl);

        //Check for error
        if ($err = curl_error($curl)) {
            echo $err;
        }
        else {
            $decoded_response = json_decode($response, true);
            return $decoded_response;
        }
        
        //Close the curl connection
        curl_close(curl);
    }
}
?>