@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
    <h4>update Store</h4>
    </div>

    <div class="card-body">
    <form action="{{ url('updatestore/'.$store->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">name</label>
                <input type="text" class="form-control" name="name" value="{{ $store->name }}">
            </div>
            <div class="col-md-12 mb-3">adress</div>
                <textarea name="adress" rows="3" class="form-control">{{ $store->adress }}</textarea>
            </div>   
            <div class="col-md-6 mb-3">
                <label for="">phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $store->phone }}">
            </div>
            @if ($store->image)
                <img src="{{ asset('assets/uploads/catagory/' . $store->image) }}" width="50px" alt="">
            @endif
            <div class="col-md-12">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection