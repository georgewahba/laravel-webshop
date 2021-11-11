@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Catagory page</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $catagory as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td><img src="{{ asset('assets/uploads/catagory/' . $item->image) }}" class="w-25" alt=""></td>
                    <td>
                        <a href="{{ url('editcatagory/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('deletecatagory/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection