@extends('layouts.front')

@section('title', $products->name)

@section('content')


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $products->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                    <input type="radio" value="{{ $j }}" name="product_rating" 
                                    id="rating{{ $j }}">
                                <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                        <div class="inner"> <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-100"
                            alt=""></div>
            
                       
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
                        @php $ratenum=number_format($rating_value) @endphp
                        <div class="rating mt-3">
                            @for ($i = 1; $i <= $ratenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $ratenum + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            @if ($ratings->count() > 0)
                                <span> {{ $ratings->count() }} Users rating this poducts </span>
                            @else
                                No Ratings
                            @endif
                        </div>
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
                        <div class="col-md-12">
                            <hr>
                            <h2>Description</h2>
                            <p class="mt-3 ">
                                {!! $products->description !!}
                            </p>
                           </div>
                           <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                    <!-- Button trigger modal -->
                    <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate this product
                    </button>
                    {{-- <hr> --}}
                    <a href="{{url('add-review/'.$products->slug.'/userreview')}}" class="btn btn-link" >
                       Write a review
                    </a>

                </div>
            
            <div class="col-md-8">
                @foreach ($reviews as $item)
                    <div class="user-review">
                         <label class="mb-2" for="">{{ $item->user->name.''.$item->user->lname }}</label>
                         @if($item->user_id==Auth::id())
                             <a href="{{url('edit-review/'.$products->slug.'/userreview')}}">edit</a>
                         @endif
                                              
                         <br>
                         @php
                         $rating=App\Models\Rating :: where('prod_id',$products->id)->where('user_id',$item->user->id)->first();
                         @endphp

                         @if ($rating)
                             @php $user_rated=$rating->stars_rated @endphp
                             @for($i =1; $i<= $user_rated; $i++)
                                 <i class="fa fa-star checked"></i>
                             @endfor
                             @for ($j=$user_rated+1; $j <= 5;$j++)
                                 <i class="fa fa-star"></i>
                                      
                             @endfor
                         @endif
                          <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>
                         <p class="mt-2">
                           {{ $item->user_review }}
                         </p>
                    </div>
                @endforeach
            </div>
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
