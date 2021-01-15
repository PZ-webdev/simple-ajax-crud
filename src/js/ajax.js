$(document).ready(function (){
    loadData();
    // deleteAllBooks();
//=============================================
    $('.add_book_modal').click(function(){
        $("#employee_id").removeAttr('value');
        $('#addBook').modal('show');
        $('#AddBookAjax')[0].reset();
    });
});

//  Add Book data using ajax and validation
$("#AddBookAjax").on("submit", function (e) {
    e.preventDefault();
    let title = $("#title");
    let author = $("#author");
    let description = $("#description");
    let category = $("#category");
    let employee_id = $("#employee_id");
    let edit_id;
// Validation form value
    // title validation
    if(title.val().length >= 5){
        title.removeClass("is-invalid");
        title.addClass("is-valid");
    }else{
        title.addClass("is-invalid");
        return false;
    }

    // author validation
    if(author.val().length >= 5){
        author.removeClass("is-invalid");
        author.addClass("is-valid");
    }else{
        author.addClass("is-invalid");
        return false;
    }

    // description validation
    if(description.val().length >= 5){
        description.removeClass("is-invalid");
        description.addClass("is-valid");
    }else{
        description.addClass("is-invalid");
        return false;
    }

    // Send data to database
    if(employee_id.val()){
        edit_id = employee_id.val();
    }else{
        edit_id = null;
    }
    $.ajax({
        type: 'POST',
        url: 'addBook.php',
        data: {  
            'title': title.val(),
            'author': author.val(),
            'description': description.val(),
            'category': category.val(),
            'employee_id': edit_id
        },
        beforeSend: function(){
            // submit.text("Sending...");
        },
        success: function (result) {
            $('#addBook').modal('toggle');
            $('#AddBookAjax')[0].reset();
            loadData();

            // remove class positive validation
            title.removeClass("is-valid");
            author.removeClass("is-valid");
            description.removeClass("is-valid");
            category.removeClass("is-valid");
        }
    });
});

// Show Books, load file: showBook.php
function loadData(){
    $(document).ready(function () {
        $("#showBook").load("showBook.php");
    });
}

// Delete Book 
function deleteBook(id) {
    console.log(id);
    $.ajax({
        type: 'POST',
        url: 'addBook.php',
        data: {
            id: id
        },
        success: function (result) {
            loadData();
        }
    });
}

// fetch data id 
$(document).on('click', '.edit_data', function(){
    var edit_id = $(this).attr("data-id");  
    console.log("Edit post: "+ edit_id);
    $.ajax({  
        url:"addBook.php",  
        method:"POST",  
        data:{
            edit_id:edit_id
        },  
        dataType:"JSON",  
        success:function(data){
            $('#title').val(data.title);  
            $('#author').val(data.author);  
            $('#description').val(data.description);  
            $('#category').val(data.category);  
            $('#employee_id').val(data.id);  
            $('#submit').html("Update");  
            $('#addBook').modal('show'); 
            loadData(); 
        },
        fail: function(data) {
            alert("Ajax error " + data);
         }  
    }); 
});

//  Delete all books
$('#deleteBook').on('submit', function(e){
    e.preventDefault();
    let deleteAll = 'deleteAll';
    $.ajax({  
        url:"addBook.php",  
        method:"POST",  
        data:{
            deleteAll:deleteAll
        }, 
        success:function(data){
            loadData();
            $('#deleteAllModal').modal('toggle');
        }
    }); 
});


