<?php
    require_once("./src/includes/autoload.php");

    $Books = new Books;
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD using jQuery & AJAX</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./src/css/main.css">
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Book</b> Management</h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#" class="btn btn-success add_book_modal" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add New Book</span></a>
                            <a href="#deleteAllModal" class="btn btn-danger" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i> <span>Delete All</span></a>
                        </div>
                    </div>
                </div>
               <div id="showBook"></div> 
            </div>
        </div>
    </div>
    <!-- Add Book modal HTML -->
    <div id="addBook" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="AddBookAjax" method="POST" action="">
                    <input type="hidden" name="employee_id" id="employee_id">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Book</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" class="form-control" required name="title" id="title">
                            <div class="invalid-feedback">
                                Minimalna długość to 5 znaków.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control" required name="author" id="author">
                            <div class="invalid-feedback">
                                Minimalna długość to 5 znaków.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" required name="description" id="description"></textarea>
                            <div class="invalid-feedback">
                                Minimalna długość to 20 znaków.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" required name="category" id="category">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-success" id="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editForm" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" id="editFormLoad">
            
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteAllModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="deleteBook">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete All Books</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete all Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger btn_deleteAllBooks" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./src/js/ajax.js"></script>
</body>

</html>