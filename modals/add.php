<div class="modal fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><b><h4>
        Add a Book
      </h4></b></div>
      <div class="modal-body">
        <div class="row">
  <div class="col-md-6">
    <label>Title:</label>
    <input type="text" name="title" id="title" class="form-control">
  </div>
  <div class="col-md-6">
    <label>ISBN:</label>
    <input type="text" name="isbn" id="isbn" class="form-control">
  </div>
</div>

<div class="row mt-2">
  <div class="col-md-4">
    <label>Author:</label>
    <input type="text" name="author" id="author" class="form-control">
  </div>
  <div class="col-md-4">
    <label>Publisher:</label>
    <input type="text" name="publisher" id="publisher" class="form-control">
  </div>
  <div class="col-md-4">
    <label>Category:</label>
    <input type="text" name="category" id="category" class="form-control">
  </div>
</div>

<div class="row mt-2">
  <div class="col-md-6">
    <label>Year Published:</label>
    <input type="number" name="year_published" id="year_published" class="form-control" min="1900" max="2099" step="1" placeholder="YYYY">
  </div>
</div>

      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-primary" onclick="add_book()">Add</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>