@extends('layouts.front')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mb-0">

                <a class="link-dec" href="{{ url('/') }}"> Home </a> >
                <a class="link-dec" href="{{ url('checkout') }}"> checkout</a>
            </h5>
        </div>
    </div>
    <div class="contener">
        <form action="{{ url('place-order') }}" method="POST">
            @csrf
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>
                                Basic Details
                                <hr>
                                <div class="row checkout-form">
                                    <div class="col-md-6">
                                        <label for="">First Name</label>
                                        <input type="text" required class="form-control fristname" name='fname'
                                            placeholder="Enter First Name" value="{{ Auth::user()->fname }}">
                                        <span id="fname_error" class="text-danger"></span>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Last Name</label>
                                        <input type="text" required class="form-control lastname" name='lname'
                                            placeholder="Enter Last Name" value="{{ Auth::user()->lname }}">
                                        <span id="lname_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Email</label>
                                        <input type="text" required class="form-control email" placeholder="Enter Email"
                                            name='email' value="{{ Auth::user()->email }}">
                                        <span id="email_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" required class="form-control phone"
                                            placeholder="Enter Phone Number" name='phone'
                                            value="{{ Auth::user()->phone }}">
                                        <span id="phone_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Address 1</label>
                                        <input type="text" required class="form-control address1"
                                            placeholder="Enter Address 1" name='address1'
                                            value="{{ Auth::user()->address1 }}">
                                        <span id="address1_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Address 2</label>
                                        <input type="text" required class="form-control address2"
                                            placeholder="Enter Address 2" name='address2'
                                            value="{{ Auth::user()->address2 }}">
                                        <span id="address2_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">City</label>
                                        <input type="text" required class="form-control city" placeholder="Enter City"
                                            name='city' value="{{ Auth::user()->city }}">
                                        <span id="city_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">State</label>
                                        <input type="text" required class="form-control state" placeholder="Enter State"
                                            name='state' value="{{ Auth::user()->state }}">
                                        <span id="state_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Country</label>
                                        <input type="text" required class="form-control country"
                                            placeholder="Enter Country" name='country'
                                            value="{{ Auth::user()->country }}">
                                        <span id="country_error" class="text-danger"></span>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Pin Code</label>
                                        <input type="text" required class="form-control pincode"
                                            placeholder="Enter Pin Code" name='pincode'
                                            value="{{ Auth::user()->pincode }}">
                                        <span id="pincode_error" class="text-danger"></span>
                                    </div>

                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>

                            @if ($cartitems->count() > 0)
                                <table class="table table-striped table-bordered">

                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($cartitems as $item)
                                            <tr>
                                                <td> {{ $item->products->name }}</td>
                                                <td> {{ $item->prod_qty }}</td>
                                                <td> {{ $item->products->selling_price }}</td>


                                            </tr>
                                        @endforeach


                                    </tbody>


                                </table>

                                <hr>
                                <button type="submit" class="btn btn-success float-end w-100">Place order</button>
                                <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with
                                    Razorpay</button>
                            @else
                                <th>
                                    <h5>No products in cart <i class="fa fa-shopping-cart text-warning "></i></h5>
                                </th>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

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
            $('.razorpay_btn').click(function(e) {
                e.preventDefault();
                //alert("Hello");

                var firstname = $('.fristname').val();
                var lastname = $('.lastname').val();
                var email = $('.email').val();
                var phone = $('.phone').val();
                var address1 = $('.address1').val();
                var address2 = $('.address2').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var country = $('.country').val();
                var pincode = $('.pincode').val();

                if (!firstname) {
                    fname_error = "First Name is required";
                    $('#fname_error').html('');
                    $('#fname_error').html(fname_error);
                } else {
                    fname_error = "";
                    $('#fname_error').html('');
                }

                if (!lastname) {
                    lname_error = "Last Name is required";
                    $('#lname_error').html('');
                    $('#lname_error').html(lname_error);
                } else {
                    lname_error = "";
                    $('#lname_error').html('');
                }

                if (!email) {
                    email_error = "Email is required";
                    $('#email_error').html('');
                    $('#email_error').html(email_error);
                } else {
                    email_error = "";
                    $('#email_error').html('');
                }

                if (!phone) {
                    phone_error = "phone is required";
                    $('#phone_error').html('');
                    $('#phone_error').html(phone_error);
                } else {
                    phone_error = "";
                    $('#phone_error').html('');
                }

                if (!address1) {
                    address1_error = "address1 is required";
                    $('#address1_error').html('');
                    $('#address1_error').html(address1_error);
                } else {
                    address1_error = "";
                    $('#address1_error').html('');
                }

                if (!address2) {
                    address2_error = "address2 is required";
                    $('#address2_error').html('');
                    $('#address2_error').html(address2_error);
                } else {
                    address2_error = "";
                    $('#address2_error').html('');
                }
                if (!city) {
                    city_error = "city is required";
                    $('#city_error').html('');
                    $('#city_error').html(city_error);
                } else {
                    city_error = "";
                    $('#city_error').html('');
                }

                if (!state) {
                    state_error = "state is required";
                    $('#state_error').html('');
                    $('#state_error').html(state_error);
                } else {
                    state_error = "";
                    $('#state_error').html('');
                }

                if (!country) {
                    country_error = "country is required";
                    $('#country_error').html('');
                    $('#country_error').html(country_error);
                } else {
                    country_error = "";
                    $('#country_error').html('');
                }

                if (!pincode) {
                    pincode_error = "pincode is required";

                    $('#pincode_error').html('');
                    $('#pincode_error').html(pincode_error);

                } else {
                    pincode_error = "";
                    $('#pincode_error').html('');
                }
                if (fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' ||
                    address1_error != '' || address2_error != '' || city_error != '' || country_error !=
                    '' || pincode_error != '' || state_error != '') {
                    return false;
                } else {
                    var data = {
                        'firstname': firstname,
                        'lastname': lastname,
                        'email': email,
                        'phone': phone,
                        'address1': address1,
                        'address2': address2,
                        'city': city,
                        'state': state,
                        'country': country,
                        'pincode': pincode
                    }
                    $.ajax({
                        method: "POST",
                        url: "{{ route('checkout.pay') }}",
                        data: data,
                        success: function(response) {
                            // alert(response.total_price)
                            var options = {
                                "key": "rzp_test_gqHmVIY7fdC799", // Enter the Key ID generated from the Dashboard
                                "amount":response.total_price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                "currency": "INR",
                                "name":response.firstname+' '+response.lastname,
                                "description": "Thank you for choosing us",
                                "image": "https://example.com/your_logo",
                                // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                "handler": function(response) {
                                    alert(response.razorpay_payment_id);
                                    
                                    
                                   
                                },
                                "prefill": {
                                    "name": response.firstname+' '+response.lastname,
                                    "email": response.email,
                                    "contact": response.phone
                                },
                                
                                "theme": {
                                    "color": "#3399cc"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.open();
                              }

                    });
                }
            });
        });
    </script>
@endsection
