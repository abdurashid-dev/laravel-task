@extends('admin.layouts.app')
@section('title')
    Subjects
@endsection
@section('content')
    <x-header title="Subjects" icon="fas fa-users"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.subjects.create')}}" class="btn btn-primary float-right">
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
                @forelse($subjects as $subject)
                    <tr>
                        <td>{{(($subjects->currentpage()-1)*$subjects->perpage()+($loop->index+1))}}</td>
                        <td>{{$subject->name}}</td>
                        <td class="w-25">
                            <a href="{{route('admin.subjects.show', $subject)}}" class="btn btn-warning">Show</a>
                            <a href="{{route('admin.subjects.edit', $subject)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('admin.subjects.destroy', $subject)}}" class="d-inline-block"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Subjects found :(</td>
                    </tr>
                @endforelse
            </table>
            <div class="mt-3 float-right">
                {{$subjects->links()}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('partials.sweet-alert')
@endsection
