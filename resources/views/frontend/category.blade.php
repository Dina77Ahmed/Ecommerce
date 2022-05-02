@extends('layouts.front')
@section('title')
    Category
@endsection
@section('content') 
<div class="py-5">
    <div class="container">
       <div class="row ">
           <div class="col-md-12">
               <h2>All categories</h2>
               <div class="row">
               @foreach ($category as $cate)
               <div class="col-md-3 mb-3">
                <a class="link-dec" href="{{url('view-category',$cate->slug)}}">
                <div class="card ">
                    <img src="{{ asset('assets/uploads/category/'. $cate->image) }}" alt="Category image" style="height: 300px">
                    <div class="card-body">
                        <h5>{{ $cate->name }}</h5>
                        <p>
                            {{ $cate->description }}
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
 </div>

@endsection
@section('scripts')
    <script>

        $(document).ready(function() {


            loadcart();
        loadwishlist() ;
            

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

    </script>
@endsection
