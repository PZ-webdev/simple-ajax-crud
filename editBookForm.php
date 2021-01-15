<?php 

require_once("./src/includes/autoload.php");
$id = $_POST['editId'];

$Books = new Books;

// $Books->fetchBook($id);

?>
<form id="EditBookAjax" method="POST" action="">
    <input type="hidden" name="editBook">
    <div class="modal-header">
        <h4 class="modal-title">Add Book</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Title:</label>
            <input type="text" class="form-control" required name="title">
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" class="form-control" required name="author">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" required name="description"></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <input type="text" class="form-control" required name="category">
        </div>
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input type="submit" class="btn btn-success" value="Add">
    </div>
</form>