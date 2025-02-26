<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Book</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editBookForm">
          <input type="hidden" name="edit_id" id="edit_id">

          <div class="row">
            <div class="col-sm-6">
              <label>Title:</label>
              <input type="text" name="edit_title" id="edit_title" class="form-control">
            </div>
            <div class="col-sm-6">
              <label>ISBN:</label>
              <input type="text" name="edit_isbn" id="edit_isbn" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <label>Author:</label>
              <input type="text" name="edit_author" id="edit_author" class="form-control">
            </div>
            <div class="col-sm-6">
              <label>Publisher:</label>
              <input type="text" name="edit_publisher" id="edit_publisher" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <label>Year Published:</label>
              <input type="number" name="edit_year" id="edit_year" class="form-control" min="1000" max="9999">
            </div>
            <div class="col-sm-6">
              <label>Category:</label>
              <input type="text" name="edit_category" id="edit_category" class="form-control">
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="updateBook()">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
