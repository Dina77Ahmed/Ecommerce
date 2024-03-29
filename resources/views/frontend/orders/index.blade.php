@extends('layouts.front')
@section('title')
My Orders
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                   <h4>My Orders</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                               
                                <tr>
                                    <td>{{date('d-m-Y',strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->tracking_no}}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>{{ $item->status=='0'?'pending':'completed' }}</td>
                                    <td>
                                    <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">view</a>
                                    </td>
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