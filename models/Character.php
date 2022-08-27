<?php
class Character {
    //Character properties
    public $id;
    public $name;
    public $born;
    public $gender;
    public $character_count;

    public function __construct() {

    }

    public function get_book_characters($id) {
         //Initiate the curl call
        $curl = curl_init();
        $url = "https://www.anapioficeandfire.com/api/books/" . $id;
        // $url = "https://www.anapioficeandfire.com/api/books/2";

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

    public function get_characters($url) {
        //Initiate the curl call
        $curl = curl_init();

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
        curl_close($curl);
    }

    public function get_character_id($url) {
        $temp_id = '';
        for ($i = 0; $i < strlen($url); $i++) {
            //$temmp_arr = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            $temp_arr = "0123456789";

            if (str_contains($temp_arr, $url[$i])) {
                $temp_id = $temp_id . $url[$i];
            }
        }

        return $temp_id;
    }
}

?>