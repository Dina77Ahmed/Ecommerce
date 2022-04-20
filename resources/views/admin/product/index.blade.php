@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Product Page</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        {{-- <th>Original Price</th> --}}
                        <th>Selling price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->name}}</td>
                            <td>{{ $item->name }}</td>
                            {{-- <td>{{ $item->original_price }}</td> --}}
                            <td>{{ $item->selling_price }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/products/' . $item->image) }}" class="cate-image " alt="Image is here">
                            </td>
                            <td>
                                <a href="{{ url('edit-product/'.$item->id) }}" class="btn bg-gradient-success">Edit</a>
                                <a href="{{ url('delete-product/'.$item->id) }}" class="btn bg-gradient-danger ">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
