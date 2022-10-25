<div class="mb-3">
    <label for="exampleInputName" class="form-label">Fullname</label>
    <input type="text" class="form-control" id="exampleInputName" name="name"
           value="{{old('name') ?? $user->name}}">
    @error('name')
    <span class="text-danger">
                    {{$message}}
                </span>
    @enderror
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1"
           aria-describedby="emailHelp"
           name="email"
           value="{{old('email') ?? $user->email}}">
    @error('email')
    <span class="text-danger">
            {{$message}}
        </span>
    @enderror
</div>
<div class="mb-3">
    <div class="form-group" data-select2-id="30">
        <label for="exampleSelectRole" class="form-label">Roles</label>
        <div class="select2-purple" data-select2-id="29">
            <select id="exampleSelectRole" class="select2 select2-hidden-accessible" multiple name="roles[]"
                    data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;"
                    data-select2-id="15" tabindex="-1" aria-hidden="true">
                @foreach($roles as $role)
                    <option value="{{$role->id}}"
                            @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @error('roles')
    <span class="text-danger">
                    {{$message}}
                </span>
    @enderror
</div>
