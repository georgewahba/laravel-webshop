@extends('layouts.frontend')

@section('title')
    catagory
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($catagory as $item)
                    <div class="col-md-3">
                        <a href="{{ url('view-cat/' . $item->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/catagory/'.$item->image) }}" alt="">
                                <div class="card-body">
                                    <h5>{{ $item->name }}</h5>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection