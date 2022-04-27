@extends('layouts.front')
@section('title')
    My Cart
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mb-0">

                <a class="link-dec" href="{{ url('/') }}"> Home </a> >
                <a class="link-dec" href="{{ url('cart') }}">
                    Cart
                </a>

            </h5>
        </div>
    </div>
    <div class="container ">
        <div class="card shadow ">
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($cartitems as $item)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt="Image here"
                                style="width: 80px;
                                 height:80px;">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6> LE {{ $item->products->selling_price }}</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            @if ($item->products->qty >= $item->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text changeQuantity decrement-btn ">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center"
                                        value="{{ $item->prod_qty }}">
                                    <button class="input-group-text changeQuantity increment-btn ">+</button>
                                </div>

                                @php $total+= $item->products->selling_price*$item->prod_qty;@endphp
                            @else
                                <h6>Out of Stock we just have {{$item->products->qty}} </h6>
                            @endif

                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart-item">

                                Remove
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <h6>
                    <span>Total price:LE {{ $total }} </span>
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success ms-5"><span>Checkout <i
                                class="fas fa-check-circle"></i></span></a>
                </h6>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-cart-item').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var prod_id = $(this).closest('.product_data').find('.prod_id').val();

                $.ajax({
                    method: "POST",
                    //  url: "delete-cart-item",
                    url: "{{ route('cart.delete') }}",
                    data: {
                        'prod_id': prod_id,
                    },

                    success: function(response) {
                        window.location.reload();
                        swal("", response.status, "success");
                    }
                });
            });



            $('.changeQuantity').click(function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var prod_id = $(this).closest('.product_data').find('.prod_id').val();
                var qty = $(this).closest('.product_data').find('.qty-input').val();



                data = {
                    'prod_id': prod_id,
                    'prod_qty': qty,
                }

                $.ajax({

                    method: "POST",
                    //   url: "update-cart",
                    url: "{{ route('cart.update') }}",
                    data: data,

                    success: function(response) {
                        window.location.reload();

                    }
                });

            });




        });
    </script>
@endsection
