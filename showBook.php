<?php 

require_once("./src/includes/autoload.php");

$Books = new Books;
if($Books->getBook() > 0){
?>
 <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>
                <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                </span>
            </th>
            <th>Title</th>
            <th>Autor</th>
            <th>Description</th>
            <th>Category</th>
            <th>Created</th>
            <th></th>
        </tr>
    </thead>

<?php foreach($Books->getBook() as $book):?>
    <tr class="counter">
        <td>
            <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="<?= $book['id'] ?>">
                <label for="checkbox1"></label>
            </span>
        </td>
        <td><?= $book['title'] ?></td>
        <td><?= $book['author'] ?></td>
        <td><?= $book['description'] ?></td>
        <td><?= $book['category'] ?></td>
        <td><?= $book['created_at'] ?></td>
        <td>
            <a href="#" class="edit-btn edit_data" data-id="<?= $book['id'] ?>" data-toggle="modal"><i class="material-icons"
                    data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            <a href="#" class="delete-btn">
                <i class="material-icons delete-btn" data-toggle="tooltip" title="Delete"
                    onclick="deleteBook(<?= $book['id'] ?>)">&#xE872;</i></a>
        </td>
    </tr>
<?php 
    endforeach;
?>
</tbody>
    </table>
<?php
}else{
    echo "<h5 class='text-center mt-3'>No data</h5>";    
}
?>