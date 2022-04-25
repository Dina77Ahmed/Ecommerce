@extends('layouts.front')
@section('title')
{{ $category->name }}
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-primary border-top">
    <div class="container">
        <h5 class="mb-0">
             
            <a class="link-dec" href="{{ url('category/') }}">Collections </a> 
            ><a class="link-dec" href="{{ url('view-category/'.$category->slug) }}">{{ $category->name }}</a>
        </h5>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2  class="mb-2"> {{$category->name}}</h2>
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <a class="link-dec" href="{{ url('category/'.$category->slug.'/'.$prod->slug) }}">
                        <div class="card">
                             <img src="{{ asset('assets/uploads/products/'. $prod->image) }}" alt="Product image">
                              <div class="card-body">
                                <h5>{{ $prod->name }}</h5>
                                <span class="float-start">{{ $prod->selling_price }} LE</span>
                                <span class="float-end"> <s>{{ $prod->original_price }}</s> LE</span>
                               
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
           
        </div>
    </div>
</div>    
@endsection