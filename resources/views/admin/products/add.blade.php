@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
    <h4>add Product</h4>
    </div>

    <div class="card-body">
    <form action="{{ url('insert-product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 mb=3">
                <select class="form-select" name="cate_id" >
                    <option >Select catagory</option>
                    @foreach ($catagory as $item)
                        <option value="{{  $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">small description</label>
                <textarea name="small_description" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-12 mb-3">description</div>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>   
            <div class="col-md-6 mb-3">
                <label for="">original price</label>
                <input type="number" name="original_price" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">selling price</label>
                <input type="number" name="selling_price" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="number" name="tax" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">quantity</label>
                <input type="number" name="qty" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">status</label>
                <input type="checkbox" name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">trending</label>
                <input type="checkbox" name="trending">
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