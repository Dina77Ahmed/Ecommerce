@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered Users</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            @if ($item->role_as == 0)
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->fname . ' ' . $item->lname }}</td>
                                <td>{{ $item->email }}</td>

                                <td>{{ $item->phone }}</td>

                                <td>
                                    <a href="{{ url('view-user/' . $item->id) }}" class="btn bg-gradient-info">View</a>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if ($item->role_as == 1)
        <div class="card mt-4">
            <div class="card-header">
                <h4> Admins</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                @if ($item->role_as == 1)
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url('view-user/' . $item->id) }}" class="btn bg-gradient-info">View</a>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
