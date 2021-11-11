@extends('layouts.frontend')

@section('name')
    Cart
@endsection

@section('content')
<div class="container my-5">
    <div class="card shadow ">
        @if($items->count() > 0)
        <h1>cart</h1>
        <div class="card-body ">
            @php 
            $total = 0;
            @endphp
            @foreach ($items as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img class="w-50"src="{{ asset('assets/uploads/catagory/' . $item->products->image) }}" alt="">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->products->selling_price }}</h6>
                </div>
                    <div class="col-md-3">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if ($item->products->qty >= $item->prod_qty)
                        <label for="quantity"></label>
                        <div class="input-group text-center mb-3" style="width: 130px">
                            <button class="input-group-text chageqty decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center qty" value="{{ $item->prod_qty }}"></input>
                            <button class="input-group-text chageqty increment-btn">+</button>
                        </div>
                        @php 
                            $total += $item->products->selling_price * $item->prod_qty;
                        @endphp
                        @else
                        <h6>out of stock</h6>
                    @endif
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger delete-cart-item">delete</button>
                </div>
            </div>
            
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total price:{{ $total }}</h6>
            <a href="{{ url('/checkout') }}"class="btn btn-success">checkout</a>
        </div>
        @else
        <h1>cart is empty</h1>
        <a href="{{ url('catagory') }}" class="btn btn-outline-primary">continue shopping</a>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
            $('.increment-btn').click(function (e) { 
            e.preventDefault();
            var inv_value = $(this).closest('.product_data').find('.qty').val();

            var value = parseInt(inv_value, 10);
            value = isNaN(value)? 0: value;
            if(value < 10) {
                value++
                $(this).closest('.product_data').find('.qty').val(value);
            }
        });
        $('.decrement-btn').click(function (e) { 
            e.preventDefault();
            var inv_value = $(this).closest('.product_data').find('.qty').val();

            var value = parseInt(inv_value, 10);
            value = isNaN(value)? 0: value;
            if(value > 1) {
                value--
                $(this).closest('.product_data').find('.qty').val(value);

            }
        });

        $('.delete-cart-item').click(function (e) { 
            e.preventDefault();
            
            var prod_id =  $(this).closest('.product_data').find('.prod_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: "/removecart",
                data: {
                    'prod_id': prod_id
                },
                success: function (response) {
                    window.location.reload();
                    swal("", response.status, "success")
                }
            });
        });

        $('.chageqty').click(function (e) { 
            window.location.reload();
            e.preventDefault();
            var prod_id =  $(this).closest('.product_data').find('.prod_id').val();
            var qty =  $(this).closest('.product_data').find('.qty').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "/updatecart",
                data: {
                    prod_id : prod_id,
                    qty: qty,
                },
                dataType: "dataType",
                success: function (response) {
                    
                }
            });
        });
    });
</script>
@endsection