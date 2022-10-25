@extends('admin.layouts.app')
@section('title')
    Students
@endsection
@section('content')
    <x-header title="Students" icon="fas fa-user-graduate"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.students.create')}}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i>
                Add new
            </a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                @forelse($students as $student)
                    <tr>
                        <td>{{(($students->currentpage()-1)*$students->perpage()+($loop->index+1))}}</td>
                        <td>{{$student->name}}</td>
                        <td class="w-25">
                            {{--                            <a href="{{route('admin.students.show', $student)}}" class="btn btn-warning">Show</a>--}}
                            <a href="{{route('admin.students.edit', $student)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('admin.students.destroy', $student)}}" class="d-inline-block"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Students found :(</td>
                    </tr>
                @endforelse
            </table>
            <div class="mt-3 float-right">
                {{$students->links()}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('partials.sweet-alert')
@endsection
