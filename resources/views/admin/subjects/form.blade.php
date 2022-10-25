<div class="mb-3">
    <label for="nameInput">Subject name</label>
    <input type="text" id="nameInput" name="name" class="form-control" value="{{old('name') ?? $subject->name}}">
    @error('name')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<button class="btn btn-primary float-right">Save</button>
