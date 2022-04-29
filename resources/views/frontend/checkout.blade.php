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
                                        <input type="text" class="form-control" name='fname'
                                            placeholder="Enter First Name" value="{{ Auth::user()->fname }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control" name='lname' placeholder="Enter Last Name"
                                            value="{{ Auth::user()->lname }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" placeholder="Enter Email" name='email'
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Enter Phone Number"
                                            name='phone' value="{{ Auth::user()->phone }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Address 1</label>
                                        <input type="text" class="form-control" placeholder="Enter Address 1"
                                            name='address1' value="{{ Auth::user()->address1 }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Address 2</label>
                                        <input type="text" class="form-control" placeholder="Enter Address 2"
                                            name='address2' value="{{ Auth::user()->address2 }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">City</label>
                                        <input type="text" class="form-control" placeholder="Enter City" name='city'
                                            value="{{ Auth::user()->city }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">State</label>
                                        <input type="text" class="form-control" placeholder="Enter State" name='state'
                                            value="{{ Auth::user()->state }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Country</label>
                                        <input type="text" class="form-control" placeholder="Enter Country" name='country'
                                            value="{{ Auth::user()->country }}">

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Pin Code</label>
                                        <input type="text" class="form-control" placeholder="Enter Pin Code"
                                            name='pincode' value="{{ Auth::user()->pincode }}">
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
                                <button type="submit" class="btn btn-primary float-end w-100">Place order</button>
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
