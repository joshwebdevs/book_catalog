<div class="modal fade" id="deleteBookModal" tabindex="-1" role="dialog" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm Deletion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this book?</p>
        <input type="hidden" id="delete_id">
        <input type="hidden" id="delete_title">
        <input type="hidden" id="delete_isbn">
        <input type="hidden" id="delete_author">
        <input type="hidden" id="delete_publisher">
        <input type="hidden" id="delete_year">
        <input type="hidden" id="delete_category">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
