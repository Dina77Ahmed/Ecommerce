@extends('layouts.front')
@section('title')
    My Cart
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-primary border-top">
    <div class="container">
        <h5 class="mb-0">
           
            <a class="link-dec" href="{{ url('/') }}"> Home </a>/
            <a class="link-dec" href="{{  url('cart') }}">
               Cart
                </a>
                
         </h5>
    </div>
</div>
    <div class="container ">
        <div class="card shadow ">
            <div class="card-body">
                @foreach ($cartitems as $item)
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/' .$item->products->image)}}"
                         alt="Image here" style="width: 80px;
                         height:80px;">
                    </div>
                    <div class="col-md-5">
                        <h6>{{$item->products->name}}</h6>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px;">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                       <button class="btn btn-danger delete-cart-item">
                           <i class="fa fa-trash"></i>
                           Remove
                       </button>
                    </div>
                </div>
                @endforeach
            @endsection
@section('scripts')

            <script>
 $(document).ready(function() {
$('.delete-cart-item').click(function (e) { 
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
             var prod_id=$(this).closest('.product_data').find('.prod_id').val();
             
             $.ajax({
                method: "POST",
                //  url: "delete-cart-item",
                 url: "{{route('cart.delete')}}",
                 data: {
                    'prod_id':prod_id,
                 },
                 
                 success: function (response) {
                     window.location.reload();
                    swal("", response.status, "success"); 
                 }
             });


                   
            });
        });
                </script>


                @endsection