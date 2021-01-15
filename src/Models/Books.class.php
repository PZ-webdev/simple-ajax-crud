<?php 

// namespace App\Models;

class Books extends Database{

    function echo()
    {
        echo "działa klasa books";
    }
    
    // Count Book
    public function count()
    {
        $query = "SELECT COUNT(*) FROM books";
        $stmt = $this->connect()->prepare($query);
        $count = $stmt->execute();
        
        return $count;
    }
    
    // Get All books
    public function getBook(){
        $query = "SELECT * FROM books ORDER BY id DESC";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
    
        while($result = $stmt->fetchAll()){
            return $result;
        }
    }

    // Save data to books
    public function addBook($title, $author, $description, $category){
        $query = "INSERT INTO books(title, author, description, category) VALUES (:title, :author, :description, :category)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            'title' => $title,
            'author'=> $author,
            'description'=> $description,
            'category'=> $category,
        ]);    
        
    }
    //  Fetch data book
    public function fetch($id)
    {
        $query = "SELECT * FROM books WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    // Update data book
    public function updateBook($title, $author, $description, $category, $id)
    {
        $query = "UPDATE books SET title = ?, author = ?, description = ?, category = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $result = $stmt->execute([$title, $author, $description, $category, $id]);
    }

    // Delete data
    public function deleteBook($id)
    {
        $query = "DELETE FROM books WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    public function deleteAll()
    {
        $query = "DELETE FROM books";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt;
    }


}