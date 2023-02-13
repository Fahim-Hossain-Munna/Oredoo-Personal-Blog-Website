<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @include('livewire.category.editmodal')
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <table class="table table-dark table-striped" id="table">
                <thead>
                    <tr>
                      <th>Sl.NO</th>
                      <th>Category Name</th>
                      <th>Category Image</th>
                      <th>Edit</th>
                      <th>Trash</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($categories as $categoey)
                        <tr>
                            <td>{{ $categories->firstItem()+$loop->index }}</td>
                            <td>{{ $categoey->category_name }}</td>
                            <td><img src="{{ asset('category_images') }}/{{ $categoey->category_image }}" class="img-fluid rounded-circle" alt="" style="width: 100px;height:100px;"></td>
                            <td> <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" wire:click='editCategory({{$categoey->id}})'><i class="material-symbols-outlined">Edit</i></button> </td>

                            <td> <button class="btn btn-danger btn-sm" wire:click="deleteCategory({{ $categoey->id }})"><i class="material-symbols-outlined">delete</i></button> </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">No Categories Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{ $categories->links() }}
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category Insert</h4>
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
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category Name</label>
                                <input type="text" class="col-sm-9 form-control input-default mb-3"  wire:model="category_name">
                                @error('category_name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category Slug</label>
                                <input type="text" class="col-sm-9 form-control input-default mb-3"  wire:model="category_slug">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category Picture</label>
                                <input type="file" class="col-sm-9 form-control input-default mb-3" wire:model="category_image">
                                @error('category_image') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-info btn-sm" wire:click="saveCategory">Insert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


