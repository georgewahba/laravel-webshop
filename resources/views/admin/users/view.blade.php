@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users Details</h4>
                    <a href=" {{ url('users') }}" class="btn btn-warning">back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">role</label>
                            <div class="p-2 border">{{ $user->role_as == '0' ? 'user': 'admin' }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">name</label>
                            <div class="p-2 border">{{ $user->name }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">email</label>
                            <div class="p-2 border">{{ $user->email }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">phone</label>
                            <div class="p-2 border">{{ $user->phone }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">adress1</label>
                            <div class="p-2 border">{{ $user->adress1 }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">adress2</label>
                            <div class="p-2 border">{{ $user->adress2 }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">city</label>
                            <div class="p-2 border">{{ $user->city }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">state</label>
                            <div class="p-2 border">{{ $user->state }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">zip</label>
                            <div class="p-2 border">{{ $user->zip }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">country</label>
                            <div class="p-2 border">{{ $user->country }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection