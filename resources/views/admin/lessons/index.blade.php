@extends('admin.layouts.app')
@section('title')
    Lessons
@endsection
@section('content')
    <x-header title="Lessons" icon="fas fa-book"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.lessons.create')}}" class="btn btn-primary float-right">
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
                @forelse($lessons as $lesson)
                    <tr>
                        <td>{{(($lessons->currentpage()-1)*$lessons->perpage()+($loop->index+1))}}</td>
                        <td>{{$lesson->name}}</td>
                        <td class="w-25">
{{--                            <a href="{{route('admin.lessons.show', $lesson)}}" class="btn btn-warning">Show</a>--}}
                            <a href="{{route('admin.lessons.edit', $lesson)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('admin.lessons.destroy', $lesson)}}" class="d-inline-block"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Lessons found :(</td>
                    </tr>
                @endforelse
            </table>
            <div class="mt-3 float-right">
                {{$lessons->links()}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('partials.sweet-alert')
@endsection
