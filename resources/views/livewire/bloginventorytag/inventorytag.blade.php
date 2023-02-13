<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div>
        @if (session()->has('insert_msg'))
            <div class="alert alert-success">
                {{ session('insert_msg') }}
            </div>
        @endif
        @if (session()->has('delete_msg'))
            <div class="alert alert-success">
                {{ session('delete_msg') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th>Sl.NO</th>
                    <th>Tag Name</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inventory_lists as $inventory)
                        <tr>
                            <td>{{ $inventory_lists->firstItem()+$loop->index }}</td>
                            <td>{{ $inventory->RelationWithTag->tag_name }}</td>
                            <td> <button class="btn btn-danger btn-sm"><i class="material-symbols-outlined" wire:click='deleteTag({{ $inventory->id }})'>delete</i></button> </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-danger">No tags Found</td>
                        </tr>
                        @endforelse
                </tbody>
            </table>
            {{ $inventory_lists->links() }}
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tags Insert</h4>
                </div>
                <div class="card-body bg-bg-body">
                    <div class="basic-form">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Available Tags</label>
                                <select class="col-sm-9 form-control input-default mb-3 @error('blog_category_id') is-invalid @enderror" wire:model="tag_id">
                                    <option class="d-none">choose tags</option>

                                        @forelse ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                        @empty

                                        @endforelse

                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-info btn-sm" wire:click="saveInsert">Insert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
