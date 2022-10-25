@extends('admin.layouts.app')
@section('title')
    Teachers
@endsection
@section('content')
    <x-header title="Teachers" icon="fas fa-users"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.teachers.create')}}" class="btn btn-primary float-right">
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
                @forelse($teachers as $teacher)
                    <tr>
                        <td>{{(($teachers->currentpage()-1)*$teachers->perpage()+($loop->index+1))}}</td>
                        <td>{{$teacher->name}}</td>
                        <td class="w-25">
                            <a href="{{route('admin.teachers.show', $teacher)}}" class="btn btn-warning">Show</a>
                            <a href="{{route('admin.teachers.edit', $teacher)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('admin.teachers.destroy', $teacher)}}" class="d-inline-block"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Teachers found :(</td>
                    </tr>
                @endforelse
            </table>
            <div class="mt-3 float-right">
                {{$teachers->links()}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('partials.sweet-alert')
@endsection
