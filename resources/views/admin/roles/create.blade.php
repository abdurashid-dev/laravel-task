<!-- Modal -->
<div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new</h5>
                <button type="button" class="btn-close btn-primary btn btn-sm" data-bs-dismiss="modal"
                        aria-label="Close"><i
                        class="fas fa-times"></i></button>
            </div>
            <form action="{{route('admin.roles.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Role name</label>
                        <input type="text" class="form-control" id="nameInput" name="name" required value="{{old('name')}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
