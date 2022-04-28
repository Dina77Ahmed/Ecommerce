@extends('layouts.front')
@section('title')
    View Order
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                   <h4>Order View</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <div class="border p-2">{{$orders->fname}}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{$orders->lname}}</div>
                               <label for="">Email</label>
                                <div class="border p-2">{{$orders->email}}</div>
                                <label for="">Contact number</label>
                                <div class="border p-2">{{$orders->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                {{ $orders->address1 }},
                                {{ $orders->address2}},
                                {{ $orders->city }},
                                {{ $orders->state }},
                                {{ $orders->country }},
                                </div>
                                <label for="">Pin Code</label>
                                <div class="border p-2">{{$orders->pincode}}</div>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Tracking Number</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                       
                                        <tr>
                                          
                                        </tr>
                                        @endforeach
                                    </tbody>
                                   </table>
                            </div>
                        </div>
                       
                    
                        </div>
                    </div>
                </div>
        
    </div>
</div>
@endsection
