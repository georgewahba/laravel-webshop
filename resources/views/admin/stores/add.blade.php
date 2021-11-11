@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
    <h4>add Store</h4>
    </div>

    <div class="card-body">
    <form action="{{ url('/insertstore') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-12 mb-3">adress</div>
                <textarea name="adress" rows="3" class="form-control"></textarea>
            </div>   
            <div class="col-md-6 mb-3">
                <label for="">phone</label>
                <input type="text" name="phone" class="form-control">
            </div>
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