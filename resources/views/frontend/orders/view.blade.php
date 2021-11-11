@extends('layouts.frontend')

@section('name')
    orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 py-12">
            <div class="card">
                <div class="card-header">
                    <h4>order view</h4>
                    <a href="{{ url("myorder") }}" class="btn btn-warning">back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">first name</label>
                            <div class="border p-2">{{ $orders->name }}</div> 
                            <label for="">last name</label>
                            <div class="border p-2">{{ $orders->lname }}</div>
                            <label for="">phone</label>
                            <div class="border p-2">{{ $orders->phone }}</div>
                            <label for="">email</label>
                            <div class="border p-2">{{ $orders->email }}</div>
                            <label for="">adress</label>
                            <div class="border p2">
                                {{ $orders->adress1 }},
                                {{ $orders->adress2 }},
                                {{ $orders->city }},
                                {{ $orders->state }},
                                {{ $orders->country }},
                                {{ $orders->zip }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <th>name</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>image</th>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)  
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td> <img src="{{ asset('assets/uploads/catagory/'. $item->products->image )}}" width="50px" alt=""></td>
                                        </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                            <h4> total = {{ $orders->total_price }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection