@extends('layouts.admin')
@section('title')
    View Order
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white">Order View
                            <a href="{{ url('orders') }}" class="btn btn-white text-info float-end">Back</a>
                        </h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 details">

                                <label for="">First Name</label>
                                <div class="border">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border">{{ $orders->email }}</div>
                                <label for="">Contact number</label>
                                <div class="border">{{ $orders->phone }}</div>
                                <label for="">Shipping Address</label>
                                <div class="border">
                                    {{ $orders->address1 }},
                                    {{ $orders->address2 }},
                                    {{ $orders->city }},
                                    {{ $orders->state }},
                                    {{ $orders->country }},
                                </div>
                                <label for="">Pin Code</label>
                                <div class="border">{{ $orders->pincode }}</div>
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
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td> <img
                                                        src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                                        width="80px" alt=""></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <h6 class="px-2">Grand Total:<span
                                        class="float-end">{{ $orders->total_price }}</span></h6>
                                <div class="mt-3">
                                <label for="">Order Status</label>
                                <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <select class="form-select" name="order_status">
                                    <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending</option>
                                    <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed</option>

                                </select>
                            </div>
                           
                            <button type="submit"class="btn btn-info float-end mt-3">
                                Update
                            </button>
                          
                        </form>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
