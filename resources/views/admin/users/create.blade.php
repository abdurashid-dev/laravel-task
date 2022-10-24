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
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            @error('password')
                            <span class="text-danger">
                            {{$message}}
                        </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPasswordConfirmation" class="form-label">Password
                                Confirmation</label>
                            <input type="password" class="form-control" id="exampleInputPasswordConfirmation"
                                   name="password_confirmation">
                            @error('password')
                            <span class="text-danger">
                            {{$message}}
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
@endsection
