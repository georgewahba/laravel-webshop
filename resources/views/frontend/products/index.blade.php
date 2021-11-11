@extends('layouts.frontend')

@section('title')
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <h2>{{ $catagory->name }}</h2>
        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-3">
                <div class="card">
                    <a href="{{  url('view-cat/'. $catagory->slug.'/'. $item->name)}}">
                    <img class="w-100" src="{{ asset('assets/uploads/catagory/'.$item->image) }}" alt="">
                    <div class="card-body">
                        <h5>{{ $item->name }}</h5>
                        <small>{{ $item->selling_price }}</small>
                        <small><s>{{ $item->original_price }}</s></small>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection