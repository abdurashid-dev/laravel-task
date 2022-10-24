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
