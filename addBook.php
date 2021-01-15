<?php 
require_once("./src/includes/autoload.php");

$books = new Books;

//  Update data 
if(isset($_POST['employee_id'])){
     if($_POST['employee_id'] != ''){
          $id = $_POST['employee_id'];
          echo 'ID: '.$id;
          $title = $_POST['title'];
          $author = $_POST['author'];
          $description = $_POST['description'];
          $category = $_POST['category'];
          
          $books->updateBook($title, $author, $description, $category, $id);
          echo "Edytowano.";
     }
}
// Save data
if(isset($_POST['employee_id'])){
     if($_POST['employee_id'] == null){
          $title = $_POST['title'];
          $author = $_POST['author'];
          $description = $_POST['description'];
          $category = $_POST['category'];
          // Save
          $result = $books->addBook($title, $author, $description, $category);
          echo "Dodano ";
     }
}

// Fetch Book to update 
if(isset($_POST['edit_id'])){
     $id = $_POST['edit_id'];
     $book = $books->fetch($id);
     echo json_encode($book); 
}

// Delete
if(isset($_POST['id'])){
     $id = $_POST['id'];
     $books->deleteBook($id);

     echo "deleteConfirm";
}

if(isset($_POST['deleteAll'])){
     $books->deleteAll();
     echo "deletedConfirm"; // Delete all books
}
