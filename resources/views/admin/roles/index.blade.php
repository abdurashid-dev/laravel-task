@extends('admin.layouts.app')
@section('title')
    Roles
@endsection
@section('content')
    <x-header title="Roles" icon="fas fa-user-lock"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.roles.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                Add new</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                @forelse($roles as $role)
                    <tr>
                        <td>{{(($roles->currentpage()-1)*$roles->perpage()+($loop->index+1))}}</td>
                        <td>{{$role->name}}</td>
                        <td>Action</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No roles found :(</td>
                    </tr>
                @endforelse
            </table>
            {{$roles->links()}}
        </div>
    </div>
@endsection
