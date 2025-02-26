<script type="text/javascript">

function add_book() {
    var title = document.getElementById("title").value.trim();
    var isbn = document.getElementById("isbn").value.trim();
    var author = document.getElementById("author").value.trim();
    var publisher = document.getElementById("publisher").value.trim();
    var category = document.getElementById("category").value.trim();
    var year_published = document.getElementById("year_published").value.trim();

    // Validate required fields
    if (title === "" || isbn === "" || author === "" || publisher === "" || category === "" || year_published === "") {
        swal("Error!", "All fields are required.", "error");
        return;
    }

    // Prepare data to send via AJAX
    var formData = new FormData();
    formData.append("title", title);
    formData.append("isbn", isbn);
    formData.append("author", author);
    formData.append("publisher", publisher);
    formData.append("category", category);
    formData.append("year_published", year_published);

    // Send AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../process/admin/add_book.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = xhr.responseText.trim();
            
            if (response === "exists") {
                swal("Error!", "Book already exists!", "error");
            } else if (response === "success") {
                swal("Success!", "Book added successfully!", "success")
                    .then(() => {
                        location.reload(); // Refresh the page
                    });
            } else {
                swal("Error!", "Something went wrong. Try again.", "error");
            }
        } else {
            swal("Error!", "Server error. Try again later.", "error");
        }
    };

    xhr.send(formData);
}



function edit_data (param){
	var data = param.split('~!~');
	var id = data[0];
	var title = data[1];
	var isbn = data[2];
	var author = data[3];
	var publisher = data[4];
	var year = data[5];
	var category = data[6];

	$('#edit_id').val(id);
	$('#edit_title').val(title);
	$('#edit_isbn').val(isbn);
	$('#edit_author').val(author);
	$('#edit_publisher').val(publisher);
	$('#edit_year').val(year);
	$('#edit_category').val(category);
}

function deleteBook (param){
	var data = param.split('~!~');
	var id = data[0];
	var title = data[1];
	var isbn = data[2];
	var author = data[3];
	var publisher = data[4];
	var year = data[5];
	var category = data[6];

	$('#delete_id').val(id);
	$('#delete_title').val(title);
	$('#delete_isbn').val(isbn);
	$('#delete_author').val(author);
	$('#delete_publisher').val(publisher);
	$('#delete_year').val(year);
	$('#delete_category').val(category);
}


function updateBook() {
    var id = document.getElementById("edit_id").value.trim();
    var title = document.getElementById("edit_title").value.trim();
    var isbn = document.getElementById("edit_isbn").value.trim();
    var author = document.getElementById("edit_author").value.trim();
    var publisher = document.getElementById("edit_publisher").value.trim();
    var category = document.getElementById("edit_category").value.trim();
    var year_published = document.getElementById("edit_year").value.trim();

    if (!id || !title || !isbn || !author || !publisher || !category || !year_published) {
        swal("Error", "All fields are required!", "error");
        return;
    }

    var formData = new FormData();
    formData.append("id", id);
    formData.append("title", title);
    formData.append("isbn", isbn);
    formData.append("author", author);
    formData.append("publisher", publisher);
    formData.append("category", category);
    formData.append("year_published", year_published);

    fetch("../../process/admin/update_book.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            swal("Success", "Book updated successfully!", "success").then(() => {
                location.reload();
            });
        } else {
            swal("Error", data.error || "Failed to update book!", "error");
        }
    })
    .catch(error => {
        swal("Error", "An error occurred while updating the book!", "error");
        console.error("Error updating book:", error);
    });
}


function confirmDelete() {
    var bookId = document.getElementById("delete_id").value;

    var formData = new FormData();
    formData.append("id", bookId);

    fetch("../../process/admin/delete_book.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            $("#deleteBookModal").modal("hide"); // Hide the modal
            swal("Deleted!", "The book has been removed.", "success").then(() => {
                location.reload(); // Refresh page after deletion
            });
        } else {
            swal("Error", "Failed to delete the book!", "error");
        }
    })
    .catch(error => {
        swal("Error", "An error occurred while deleting the book!", "error");
        console.error("Error deleting book:", error);
    });
}




</script>