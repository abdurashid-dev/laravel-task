<div class="mb-3">
    <label for="nameInput">Teacher name</label>
    <input type="text" id="nameInput" name="name" class="form-control" value="{{old('name') ?? $teacher->name}}">
</div>
<div class="mb-3">
    <label for="subjectsSelect">Choose Subject</label>
    <select name="subject_id" id="subjectsSelect" class="form-control">
        @forelse($subjects as $subject)
            <option value="{{$subject->id}}"
                    @if($subject_id == $teacher->$subject_id) selected @endif>{{$subject->name}}</option>
        @empty
            <option disabled>No subjects found :(</option>
        @endforelse
    </select>
</div>
<button class="btn btn-primary float-right">Save</button>
