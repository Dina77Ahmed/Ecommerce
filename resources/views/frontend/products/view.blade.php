@extends('layouts.front')

@section('title', $products->name)

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mb-0">Collections / {{ $products->category->name }}/ {{ $products->name }} </h5>
        </div>
    </div>
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-100"
                            alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size: 16px;" class="float-end badge bg-danger trending tag">
                                    Trending
                                </label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original Price : <s>LE {{ $products->original_price }}</s></label>
                        <label class="fw-bold">Selling Price : LE {{ $products->selling_price }}</label>
                        <p class="mt-3 ">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="Quantity">Quantity</label>
                               
                                <div class="input-group text-center mb-3" style="width: 120px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity " value="1" class="form-control qty-input text-center " />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>

                            </div>
                            <div class="col-md-9">
                                <br />
                                <button type="button" class="btn btn-success me-3 ms-3 float-start">Add to Wishlist <li
                                        class="fa fa-heart  text-danger"></li></button>
                                <button type="button" class="btn btn-primary me-3 float-start ">Add to Cart<li
                                        class="fa fa-shopping-cart text-warning "></li></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                    <h2>Description</h2>
                    <p class="mt-3 ">
                        {!! $products->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        $(document).ready(function() 
        {
            $('.increment-btn').click(function(e) {
                e.preventDefault();

                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) 
                {
                    value++;
                    $('.qty-input').val(value);
                }


            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                
                var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) 
                {
                    value--;
                    $('.qty-input').val(value);
                }


            });
        });
    </script>
@endsection