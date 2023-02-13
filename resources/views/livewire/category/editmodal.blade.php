<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="fresh()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="basic-form">
                <form>
                    <input type="hidden" value="{{ $category_id }}">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <input type="text" class="col-sm-9 form-control input-default mb-3"  wire:model.defer="category_name">
                        @error('category_name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Picture</label>
                        <input type="file" class="col-sm-9 form-control input-default mb-3" wire:model.defer="category_image">
                        @error('category_image') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-info btn-sm" wire:click="updateCategory()">update</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="reloadPage" class="btn btn-secondary btn-sm" data-dismiss="modal" wire:click="cancel()">Close</button>
        </div>
      </div>
    </div>
  </div>


