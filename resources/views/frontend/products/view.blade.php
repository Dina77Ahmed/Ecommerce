@extends('layouts.front')

@section('title', $products->name)

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mb-0">

                <a class="link-dec" href="{{ url('category/') }}"> Collections </a>>
                <a class="link-dec" href="{{ url('view-category/' . $products->category->slug) }}">
                    {{ $products->category->name }}
                </a>
                >><a class="link-dec"
                    href="{{ url('category/' . $products->category->slug . '/' . $products->slug) }}">{{ $products->name }}</a>
            </h5>
        </div>
    </div>
    <div class="container">
        <div class="card shadow product_data">
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
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>

                                <div class="input-group text-center " style="width: 120px">
                                    <button class="input-group-text decrement-btn">-</button>

                                    <input type="text" name="quantity " value="1"
                                        class="form-control qty-input text-center " />

                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9 mt-4 ms-3">
                                @if ($products->qty > 0)
                                    <button type="button" class="btn btn-primary float-start addToCartBtn">Add to Cart
                                        <li class="fa fa-shopping-cart text-warning "></li>
                                    </button>
                                @endif
                                <button type="button" class="btn btn-success addtowishlist ms-3 float-start">Add to Wishlist
                                    <li class="fa fa-heart  text-danger"></li>
                                </button>


                            </div>

                        </div>


                        {{-- <div class="row mt-2">
                            <div class="col-md-9 mb-2">
                                <div class="col-md-5">
                                    <select class="form-select mb-3 " aria-label="Default select example">
                                        <option selected> Size</option>
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="3">XL</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="form-select " aria-label="Default select example">
                                        <option selected> Color</option>
                                        <option value="1">Red</option>
                                        <option value="2">Green</option>
                                        <option value="3">Blue</option>
                                        <option value="4">Yallow</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row mt-2">
                            <div class="col-md-9 mb-2"> --}}

                        {{-- @if ($products->qty > 0)
                                    <button type="button" class="btn btn-primary float-start addToCartBtn">Add to Cart
                                        <li class="fa fa-shopping-cart text-warning "></li>
                                    </button>
                                 @endif
                                    <button type="button" class="btn btn-success float-start">Add to Wishlist <li
                                            class="fa fa-heart  text-danger"></li></button> --}}

                        {{-- </div>
                        </div> --}}

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
        $(document).ready(function() {
            loadcart();
            loadwishlist();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            function loadcart() {
                $.ajax({


                    method: "GET",
                    //cartload.add
                    //url: "/load-cart-data",
                    url: "{{ route('cartload.add') }}",
                    success: function(response) {
                        $('.cart-count').html('');
                        $('.cart-count').html(response.count);
                        // alertresponse.count


                    }
                });

            }

            function loadwishlist() {
                $.ajax({


                    method: "GET",
                    //cartload.add
                    //url: "/load-cart-data",
                    url: "{{ route('wishlistload.add') }}",
                    success: function(response) {
                        $('.wishlist-count').html('');
                        $('.wishlist-count').html(response.count);
                        // alertresponse.count

                    }
                });

            }

            $('.addToCartBtn').click(function(e) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "{{ route('cart.add') }}",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },


                    success: function(response) {
                        swal(response.status);
                        loadcart();

                    }

                });


            });

            $('.addtowishlist').click(function(e) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "{{ route('wishlist.insert') }}",
                    data: {
                        'product_id': product_id,

                    },
                    success: function(response) {
                        swal(response.status);
                        loadwishlist();

                    }

                });

            });
        });
    </script>
@endsection
