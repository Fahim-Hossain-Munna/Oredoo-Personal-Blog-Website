<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    @include('livewire.tag.tageditmodal')
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <table class="table table-dark table-striped" id="table">
                <thead>
                    <tr>
                      <th>Sl.NO</th>
                      <th>Tag Name</th>
                      <th>Tag Slug</th>
                      <th>Edit</th>
                      <th>Trash</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($tags as $tag)
                        <tr>
                            <td>{{ $tags->firstItem()+$loop->index }}</td>
                            <td>{{ $tag->tag_name }}</td>
                            <td>{{ $tag->tag_slug }}</td>
                            <td> <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#TagEditModal" wire:click='editTag({{$tag->id}})'><i class="material-symbols-outlined">Edit</i></button> </td>
                            <td> <button class="btn btn-danger btn-sm" wire:click="deleteTag({{ $tag->id }})"><i class="material-symbols-outlined">delete</i></button> </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">No tag Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{ $tags->links() }}
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tag Insert</h4>
                </div>
                <div class="card-body bg-bg-body">
                    <div class="basic-form">
                        <form>
                            <div>
                                @if (session()->has('insert_msg'))
                                    <div class="alert alert-success">
                                        {{ session('insert_msg') }}
                                    </div>
                                @endif
                                @if (session()->has('update_msg'))
                                    <div class="alert alert-success">
                                        {{ session('update_msg') }}
                                    </div>
                                @endif
                                @if (session()->has('delete_msg'))
                                    <div class="alert alert-success">
                                        {{ session('delete_msg') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tag Name</label>
                                <input type="text" class="col-sm-9 form-control input-default mb-3"  wire:model="tag_name">
                                @error('tag_name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tag Slug</label>
                                <input type="text" class="col-sm-9 form-control input-default mb-3"  wire:model="tag_slug">
                                @error('tag_slug') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-info btn-sm" wire:click="saveTag">Insert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
