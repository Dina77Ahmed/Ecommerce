@extends('layouts.front')
@section('title')
    My Wishlist
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mb-0">

                <a class="link-dec" href="{{ url('/') }}"> Home </a> >
                <a class="link-dec" href="{{ url('Wishlist') }}">
                    Wishlist
                </a>

            </h5>
        </div>
    </div>

    <div class="container ">
        <div class="cart shadow">
            <div class="card-body">
                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                        <div class="row product_data">
                            <div class="col-md-1 my-auto">
                                <img  src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                    alt="Image here" style="width: 80px;
                                                         height:80px; " class="mb-3" >
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->products->name }}</h6>
                            </div>
                            <div class="col-md-1 my-auto">
                                <h6> LE {{ $item->products->selling_price }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                            <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text changeQuantity decrement-btn ">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center"
                                        value="1">
                                    <button class="input-group-text changeQuantity increment-btn ">+</button>
                                </div>
                            </div>
                            <div class="col-md-1 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if ($item->products->qty >= $item->prod_qty)
                                    <h6>In Stock</h6>
                                @else
                                    <h6>Out of Stock we just have {{ $item->products->qty }} </h6>
                                @endif

                            </div>
                            
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-success addToCartBtn">

                                    Add to Cart
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </div>

                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger remove-wishlist-item ">

                                    Remove
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
            </div>
        @else
            <h4>There are no products in your Wishlist</h4>
            @endif
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
    
            
            $( '.remove-wishlist-item').click(function (e) { 
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
                    url: "{{ route('wishlist.delete') }}",
                    data: {
                        'prod_id': prod_id,
                    },

                    success: function(response) {
                        window.location.reload();
                        swal("", response.status, "success");
                         loadwishlist();

                    }
                });
            });
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
                
              
         }); 

</script>
@endsection
