@extends('layouts.frontend')

@section('title', $products->name)

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">collection/{{ $products->catagory->name }}/{{$products->name}}</h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img class ="w-100" src="{{ asset('assets/uploads/catagory/'.$products->image) }}" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $products->name }}
                        @if ($products->trending == '1')
                        <label style="font-size:16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3">Original price : <s>{{ $products->original_price }}</s></label>
                    <label class="font-weight-bold">Selling price : {{ $products->selling_price }}</label>
                    <p class="mt-3">
                        {{ $products->small_description }}
                    </p>
                    <hr>
                    @if ($products->qty > 0)
                        <label class="text-light badge bg-success">in stock</label>
                    @else
                        <label class="text-light badge bg-danger">out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <label class="quantity">quantity</label>
                            <div class="input-group text-center mb-3">
                                <span class="input-group-text decrement-btn">-</span>
                                <input type="text" name="quantity " value="1" class="qty form-control" />
                                <span class="input-group-text increment-btn">+</span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            @if ($products->qty > 0)
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <button type="button" class="addtocart btn btn-primary me-3 float-start">add to cart</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>description</h3>
                    <p class="mt-3">
                        {{ $products->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.addtocart').click(function (e) { 
            e.preventDefault();
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var prod_qty = $(this).closest('.product_data').find('.qty').val();
            window.location.href = "/";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/addtocart",
                data: { 
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'prod_id' : prod_id,
                    'prod_qty' : prod_qty,
                },
                dataType: "dataType",
                success: function (response) {
                    swal(response.status)
                }
            });
        });

        $('.increment-btn').click(function (e) { 
            e.preventDefault();
            
            var inv_value = $('.qty').val();
            var value = parseInt(inv_value, 10);
            value = isNaN(value)? 0: value;
            if(value < 10) {
                value++
                $('.qty').val(value);
            }
        });
        $('.decrement-btn').click(function (e) { 
            e.preventDefault();
            
            var inv_value = $('.qty').val();
            var value = parseInt(inv_value, 10);
            value = isNaN(value)? 0: value;
            if(value > 1) {
                value--
                $('.qty').val(value);
            }
        });
    });
</script>
@endsection