@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
    <h4>add catagorie</h4>
    </div>

    <div class="card-body">
    <form action="{{ url('insert-catagory') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">slug</label>
                <input type="text" class="form-control" name="slug">
            </div>
            <div class="col-md-12 mb-3">description</div>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>   
            <div class="col-md-6 mb-3">
                <label for="">status</label>
                <input type="checkbox" name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">popular</label>
                <input type="checkbox" name="popular">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">meta title</label>
                <input type="text" class="form-control" name="meta_title">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">meta keywords</label>
                <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">meta description</label>
                <textarea name="meta_description" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-12">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection