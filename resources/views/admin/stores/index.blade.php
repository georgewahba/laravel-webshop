@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Products page</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>adress</th>
                    <th>phone</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $stores as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->adress}}</td>
                    <td>{{$item->phone}}</td>
                    <td><img src="{{ asset('assets/uploads/catagory/' . $item->image) }}" width="50px" alt=""></td>
                    <td>
                        <a href="{{ url('editstore/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('deletestore/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection