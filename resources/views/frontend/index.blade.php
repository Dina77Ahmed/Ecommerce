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
                                <div class="inner">
                                <img src="{{ asset('assets/uploads/products/'. $prod->image) }}" style="height: 300px;width:100%;" alt="Product image">
                                </div>
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
    <div class="py-5 ">
        <div class="container">
           <h2  class="mb-2">Trending categories</h2>
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a class="link-dec" href="{{url('view-category',$tcategory->slug)}}">
                            <div class="card">
                                <div class="inner">
                                <img src="{{ asset('assets/uploads/category/'. $tcategory->image) }}"style="height: 300px ;width:100%" alt="Category image">
                                </div>
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
        {{-- <footer  class="text-center text-lg-start text-white pt-5 pb-4 " style="background-color: #0d6efd">
            <div  class="container text-center text-md-left bottom">
                <div  class="row text-center text-md-left">
                    <div  class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                       <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Blue Moon</h5>
                       <p>
                         Here you can use rows and columns to organize your footer content.
                          Lorem ipsum dolor sit amet,
                         ital consectetur lorem ipsum dolor sit amet adipisicing elit.
                       </p>
 
                     </div>
                     <div  class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Products</h5>
                        <p>
                           <a  href="#" class="text-white" style="text-decoration: none;"> Pricing</a>
                        </p>
                        <p>
                           <a  href="#" class="text-white" style="text-decoration: none;"> Features</a>
                        </p>
                        <p>
                           <a  href="#" class="text-white" style="text-decoration: none;"> Suggestion</a>
                        </p>
                        <p>
                           <a  href="#" class="text-white" style="text-decoration: none;"> Shipping Rates</a>
                        </p>
 
                     </div>
                     <div  class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5  class="text-uppercase mb-4 font-weight-bold text-warning">Need Help </h5>
                        <p>
                           <a  href="#" class="text-white" style="text-decoration: none;"> Your Account</a>
 
                        </p>
                        <p>
                           <a  href="#" class="text-white" style="text-decoration: none;"> Connect Us</a>
                        </p>
                        <p>
                           <a  href="#" class="text-white" style="text-decoration: none;"> About Us</a>
                        </p>
                        <p>
                           <a  href="#" class="text-white" style="text-decoration: none;"> Help</a>
                        </p>
 
                     </div>
 
                     <div  class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                        <p>
                            <i  class="fas fa-home mr-3"></i>Alexandria, elshatbi
                        </p>
                        <p>
                            <i  class="fas fa-envelope mr-3"></i> team98@gmail.com
                        </p>
                        <p>
                            <i  class="fas fa-phone mr-3"></i> +92 2543801672
                        </p>
                        <p>
                            <i  class="fas fa-print mr-3"></i> +01 335 633 77
                        </p>
                     </div>
 
                 </div>
                 <hr class="mb-4">
                 <div  class="row align-items-center">
                     <div  class="col-md-7 col-lg-8">
                         <p> Copyright ©2022 All rights reserved by:
                             <a href="about2.html" style="text-decoration: none">
                                 <strong class="text-warning">Blue Team</strong>
                             </a>
                         </p>
                     </div>
 
                     <div  class="col-md-5 col-lg-4">
                         <div  class="text-center text-md-right">
                            <ul  class="list-unstyled list-inline">
                                <li  class="list-inline-item">
                                     <a href="https://www.facebook.com/" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
                                </li>
 
                                <li  class="list-inline-item">
                                     <a href="https://twitter.com/i/flow/login" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
                                </li>
 
                                <li  class="list-inline-item">
                                     <a href="https://www.google.com/intl/ar/gmail/about/" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab
                                     fa-google-plus"></i></a>
                                </li>
 
                                <li  class="list-inline-item">
                                     <a href="https://www.instagram.com/" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-linkedin-in"></i></a>
                                </li>
 
                                <li  class="list-inline-item">
                                     <a href="https://www.youtube.com/" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
 
                    </div>
                </div>
 
            </div> 
 
 
         </footer> --}}
    
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
