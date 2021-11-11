@extends('layouts.frontend')

@section('title')
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <h2>contact</h2>
        <div class="row">
            @foreach ($stores as $item)
                <div class="col-md-3">
                    <div class="card">
                        <img class="w-100" src="{{ asset('assets/uploads/catagory/'.$item->image) }}" alt="">
                        <div class="card-body">
                            <h5>{{ $item->name }}</h5>
                            <small>{{ $item->adress }}</small>
                            <small>{{ $item->phone }}</small>
                        </div>
                </div>
            </div>
            @endforeach
        
    </div>
</div>
@endsection