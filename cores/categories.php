<?php


class Category{

    //db stuffs
    private $conn;
    private $table = 'categories';

    //category properties 
    public $id;
    public $name;
    public $created_at;
    


    //constructor with db connection
    public function __construct($db){

        $this->conn = $db;

    }
    //getting users from the database
    public function read(){

        //create query
        $query = 'SELECT *From
             ' .$this->table; 
            
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }

    public function read_single(){

        $query = 'SELECT 
        c.name as category_name,
        p.id,
        p.category_id,
        p.title,
        p.body,
        p.author,
        p.created_at
            From
             ' .$this->table . ' p 
            LEFT JOIN
            categories c ON p.category_id = c.id
            WHERE p.id = ? LIMIT 1';

            //prepare statement
        $stmt = $this->conn->prepare($query);

        //binding param
        $stmt->bindParam(1, $this->id);

        //executing query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];

        return $stmt;
    }

    public function create(){
        //create query here

        $query = 'INSERT INTO' .$this->table . ' SET category_id = :category_id, title = :title,  body = :body, author = :author';

          //prepare statement
          $stmt = $this->conn->prepare($query);

          //clean the data
          $this->title = htmlspecialchars(strip_tags($this->title));
          $this->body = htmlspecialchars(strip_tags($this->body));
          $this->author = htmlspecialchars(strip_tags($this->author));
          $this->tcategory_id = htmlspecialchars(strip_tags($this->category_id));
          //$this->title = htmlspecialchars(strip_tags($this->title);)
          //$this->title = htmlspecialchars(strip_tags($this->title);)

          //binding of params 
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':body', $this->body);
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':category_id', $this->category_id);

          //execute the query
          if($stmt->execute()){

                return true;
          }

          //print error if something goes wrong
          printf("Error %s.  \n", $stmt->error);
          return false;
    }
    //update post function

    public function update(){
        //create query here

        $query = 'UPDATE' .$this->table .
         ' SET category_id = :category_id, title = :title,  body = :body, author = :author
         WHERE id = :id';
          //prepare statement

          $stmt = $this->conn->prepare($query);

          //clean the data
          $this->title = htmlspecialchars(strip_tags($this->title));
          $this->body = htmlspecialchars(strip_tags($this->body));
          $this->author = htmlspecialchars(strip_tags($this->author));
          $this->category_id = htmlspecialchars(strip_tags($this->category_id));
          $this->id = htmlspecialchars(strip_tags($this->id));
          //$this->title = htmlspecialchars(strip_tags($this->title);)

          //binding of params 
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':body', $this->body);
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':category_id', $this->category_id);
          $stmt->bindParam(':id', $this->id);

          //execute the query
          if($stmt->execute()){

                return true;
          }

          //print error if something goes wrong
          printf("Error %s.  \n", $stmt->error);
          return false;
    }

    //delete function

    public function delete(){

        //create query
    $query = 'DELETE FROM ' . $this->table. 'WHERE id =:id';

    //prepare query
    $stmt = $this->conn->prepare($query);

//clean the data
$this->id = Htmlspecialchars(strip_tags($this->id));

//binding parameter
$stmt->bindParams(':id', $this->id);

//execute query
if($stmt->execute()){

return true;

}
else{
    printf("error %s. \n", $stmt->error);
}
    }
}
?> 