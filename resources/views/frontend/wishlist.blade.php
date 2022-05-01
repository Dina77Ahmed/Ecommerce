@extends('layouts.front')
@section('title')
    My Wishlist
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mb-0">

                <a class="link-dec" href="{{ url('/') }}"> Home </a> >
                <a class="link-dec" href="{{ url('Wishlist') }}">
                    Wishlist
                </a>

            </h5>
        </div>
    </div>
    <div class="container ">
        <div class="cart shadow">
            <div class="card-body">
                @if ($wishlist->count() > 0)
                @else
                    <h4>There are no products in your Wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection


