<?php
class Comment {
    //Db properties
    private $conn;
    private $table = 'comments';

    //Comment properties
    public $id;
    public $comment;
    public $book_id;

    //Comment constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        //prepare the query
        $query = 'INSERT INTO ' . $this->table . ' SET comment = :comment, book_id = :book_id';

        //prepare the statement
        $stmt = $this->conn->prepare($query);

        // Clean the input data
        $this->comment = htmlspecialchars(strip_tags($this->comment));
        $this->book_id = htmlspecialchars(strip_tags($this->book_id));

        //Bind the parameters
        $stmt->bindParam(':comment', $this->comment);
        $stmt->bindParam(':book_id', $this->book_id);

        //Execute the stmt
        if($stmt->execute()) {
             return true;
        }   
        else {
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);
        }

        return false;
    }

     /**
     * @OA\Get(
     *     path="/findworker-task/api/comment/get_comments.php",
     *     summary="Get Comments for a book",
     *     tags={"Comments"},
     *     @OA\Parameter(
     *          name="id",
     *          in="query",
     *          required=true,
     *          description="Book id to get the all the comments",
     *          @Oa\Schema(
     *              type="string",
     *          ),
     *     ),
     *     @OA\Response(response="200", description="An example resource"),
     *     @OA\Response(response="404", description="Not Found")
     * )
     */
    public function get_book_comments() {
        //Prepare the query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE book_id = ?';

        //Prepare the statement
        $stmt = $this->conn->prepare($query);

        //Bind param
        $stmt->bindParam(1, $this->book_id);

        //Execute stmt
        if ($stmt->execute())
        {
            return $stmt;
        }      
        else {
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);
        }

        return false;
    }

    public function get_book_comment_count($id) {
        //Prepare the query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE book_id = ?';

        //Prepare the statement
        $stmt = $this->conn->prepare($query);

        //Bind param
        $stmt->bindParam(1, $id);

        //Execute stmt
        if ($stmt->execute())
        {
            return $stmt->rowCount();
        }      
        else {
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);
        }

        return 0;
    }
}

?>