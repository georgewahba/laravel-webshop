@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
    <h4>edit Product</h4>
    </div>

    <div class="card-body">
    <form action="{{ url('update-product/'. $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12 mb=3">
                <select class="form-select form-select-lg mb-3form-select form-select-lg mb-3" name="cate_id" >
                    <option >{{ $product->catagory->name }}</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">name</label>
                <input value="{{ $product->name }}" type="text" class="form-control" name="name">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">small description</label>
                <textarea name="small_description" rows="3" class="form-control">{{ $product->small_description }}</textarea>
            </div>
            <div class="col-md-12 mb-3">description</div>
                <textarea name="description" rows="3" class="form-control">{{ $product->description }}</textarea>
            </div>   
            <div class="col-md-6 mb-3">
                <label for="">original price</label>
                <input type="number" value="{{ $product->original_price }}" name="original_price" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">selling price</label>
                <input type="number" value="{{ $product->selling_price }}" name="selling_price" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="number" value="{{ $product->tax }}" name="tax" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">quantity</label>
                <input type="number" value="{{ $product->qty }}" name="qty" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">status</label>
                <input type="checkbox" {{ $product->status == '1' ? 'checked' : ''}} name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">trending</label>
                <input type="checkbox" {{ $product->trending == '1' ? 'checked' : ''}} name="trending">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">meta title</label>
                <input type="text" value="{{ $product->meta_title }}" class="form-control" name="meta_title">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">meta keywords</label>
                <textarea name="meta_keywords" rows="3" class="form-control">{{ $product->meta_keywords }}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">meta description</label>
                <textarea name="meta_description" rows="3" class="form-control">{{ $product->meta_descrip }}</textarea>
            </div>
            @if ($product->image)
            <img src="{{ asset('assets/uploads/catagory/' . $product->image) }}" alt="">
            @endif
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