@extends('layouts.frontend')

@section('name')
    welkom bij Robbins Bakery
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <h2>featured products</h2>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/catagory/'.$product->image) }}" alt="">
                        <div class="card-body">
                            <h5>{{ $product->name }}</h5>
                            <small>{{ $product->selling_price }}</small>
                            <small><s>{{ $product->original_price }}</s></small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a>
        </div>
    </div>

@endsection