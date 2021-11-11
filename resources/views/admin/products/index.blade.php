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
                    <th>catagory</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>original_price</th>
                    <th>selling_price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->catagory->name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->original_price}}</td>
                    <td>{{$item->selling_price}}</td>
                    <td><img src="{{ asset('assets/uploads/catagory/' . $item->image) }}" class="w-25" alt=""></td>
                    <td>
                        <a href="{{ url('editproduct/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('deleteproduct/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection