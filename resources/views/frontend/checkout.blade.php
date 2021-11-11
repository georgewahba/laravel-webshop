@extends('layouts.frontend')

@section('name')
  checkout
@endsection

@section('content')
<div class="container mt-5">
    <form action="{{url('placeorder')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>badic detail</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">first name</label>
                            <input  type="text" name="name" class="form-control" placeholder="enter first name">
                        </div>
                        <div class="col-md-6">
                            <label for="">last name</label>
                            <input name="lname" type="text" class="form-control" placeholder="enter last name">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input name="email" type="text" class="form-control" placeholder="enter email">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">phone number</label>
                            <input name="phone" type="text" class="form-control" placeholder="enter phone number">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">adress 1</label>
                            <input name="adress1" type="text" class="form-control" placeholder="enter adress 1">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">adress 2</label>
                            <input name="adress2" class="form-control" placeholder="enter adress 2">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">city</label>
                            <input name="city" type="text" class="form-control" placeholder="enter city">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">state</label>
                            <input name="state" type="text" class="form-control" placeholder="enter state">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">country</label>
                            <input name="country" type="text" class="form-control" placeholder="enter country">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">zip code</label>
                            <input name="zip" type="text" class="form-control" placeholder="enter zipcode">
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartitems as $item)
                                <tr>
                                    <td>{{ $item->products->name }}</td>
                                    <td>{{ $item->prod_qty }}</td>
                                    <td>{{ $item->products->selling_price }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>                        
                <button type="submit" class="btn btn-primary">submit</button>
                    </form>
            </div>
        </div>
</div>
@endsection
