@extends('admin.layouts.app')
@section('title')
    Teachers
@endsection
@section('content')
    <x-headers title="Create teacher" icon="fas fa-plus" parent="Teacher" parent-route="admin.teachers.index"
               parent-icon="fas fa-users"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.teachers.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nameInput">Teacher name</label>
                    <input type="text" id="nameInput" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="subjectsSelect">Choose Subject</label>
                    <select name="subject_id" id="subjectsSelect" class="form-control">
                        @forelse($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                        @empty
                            <option disabled>No subjects found :(</option>
                        @endforelse
                    </select>
                </div>
                <button class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
@endsection
