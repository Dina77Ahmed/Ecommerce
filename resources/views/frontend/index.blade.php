@extends('layouts.front')
@section('title')
    welcome to Blue Moon
@endsection
@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
           <h2  class="mb-2"> Featured Products</h2>
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/'. $prod->image) }}" style="height: 300px" alt="Product image">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <span class="float-start">{{ $prod->selling_price }}</span>
                                    <span class="float-end"> <s>{{ $prod->original_price }}</s></span>
                                   
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
           <h2  class="mb-2">Trending categories</h2>
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a class="link-dec" href="{{url('view-category',$tcategory->slug)}}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/category/'. $tcategory->image) }}"style="height: 300px" alt="Category image">
                                <div class="card-body">
                                    <h5>{{ $tcategory->name }}</h5>
                                    <p>
                                        {{ $tcategory->description }}
                                    </p>
                                   
                                </div>
                            </div>
                        </a>
                        </div>
                    @endforeach
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
    });


        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots:false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
