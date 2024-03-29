@extends('layouts.front')
@section('title')
    View Order
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                   <h4 class="text-white">Order View
                    <a href="{{ url('my-orders') }}" class="btn btn-warning text-white float-end">Back</a>
                   </h4>
                  
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 details">
                                
                                <label for="">First Name</label>
                                <div class="border">{{$orders->fname}}</div>
                                <label for="">Last Name</label>
                                <div class="border">{{$orders->lname}}</div>
                               <label for="">Email</label>
                                <div class="border">{{$orders->email}}</div>
                                <label for="">Contact number</label>
                                <div class="border">{{$orders->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border">
                                {{ $orders->address1 }},
                                {{ $orders->address2}},
                                {{ $orders->city }},
                                {{ $orders->state }},
                                {{ $orders->country }},
                                </div>
                                <label for="">Pin Code</label>
                                <div class="border">{{$orders->pincode}}</div>
                            </div>
                            <div class="col-md-6">
                                <h6>Order Details</h6>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Name </th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                       
                                        <tr>
                                          <td>{{$item->products->name}}</td>
                                          <td>{{$item->qty}}</td>
                                          <td>{{$item->price}}</td>
                                        <td> <img src="{{asset('assets/uploads/products/'.$item->products->image)}}"width="80px" alt=""></td> 
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                   </table>
                                   <h6 class="px-2">Grand Total:<span class="float-end">{{ $orders->total_price }}</span></h6>
                            </div>
                        </div>
                       
                    
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
    });
   

    </script>
@endsection
