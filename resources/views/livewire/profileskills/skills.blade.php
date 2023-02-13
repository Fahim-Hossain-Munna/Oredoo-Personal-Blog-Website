<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                      <th>Sl.NO</th>
                      <th>Your Skills</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($my_skills as $skill)
                        <tr>
                            <td>{{ $my_skills->firstItem()+$loop->index }}</td>
                            <td>{{ $skill->skills }}</td>
                            <td> <button class="btn btn-danger btn-sm" wire:click="deleteSkills({{ $skill->id }})"><i class="material-symbols-outlined">delete</i></button> </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-danger">No Skills Found</td>
                        </tr>
                        @endforelse
                  </tbody>
            </table>
            {{ $my_skills->links() }}
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Skills Insert</h4>
                </div>
                <div class="card-body bg-bg-body">
                    <div class="basic-form">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Skills</label>
                                <input type="text" class="col-sm-9 form-control input-default mb-3" placeholder="html,css,js,etc...." wire:model="skills">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-info btn-sm" wire:click="saveSkills">Insert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
