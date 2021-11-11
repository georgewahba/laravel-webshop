@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Users</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $users as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        <a href="{{ url('viewuser/'.$item->id)}}" class="btn btn-danger">view</a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection