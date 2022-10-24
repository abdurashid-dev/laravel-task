@extends('admin.layouts.app')
@section('title')
    Create user
@endsection
@section('content')
    <x-headers title="Add user" icon="fas fa-plus" parent="Users" parent-icon="fas fa-users"
               parent-route="admin.users.index"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.users.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        @include('admin.users.forms')
                    </div>
                    <div class="col-md-6 col-sm-12">
                        @include('admin.users.password-forms')
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
@endsection
