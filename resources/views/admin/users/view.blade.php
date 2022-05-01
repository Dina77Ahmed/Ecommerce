@extends('layouts.admin')
@section('content')
    <div class="container"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-info">
                    <h4>Users Details  <a href="{{url('users')}}" class="btn btn-white text-info float-end">Back</a></h4>
                   
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Role</label>
                            <div class="p-2 border mb-4">{{ $users->role_as == '0'? 'User': 'Admin'}}</div>
                            </div>
                           @if ( $users->role_as == '0')
                               
                           
                
                        <div class="col-md-4">
                            <label for="">First Name</label>
                            <div class="p-2 border mb-4">{{ $users->fname }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Last Name</label>
                            <div class="p-2 border mb-4">{{ $users->lname }} </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Email</label>
                            <div class="p-2 border mb-4">{{ $users->email }} </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">phone</label>
                            <div class="p-2 border mb-4">{{ $users->phone }} </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Address 1</label>
                            <div class="p-2 border mb-4">{{ $users->address1 }}</div>
                            </div>
                        <div class="col-md-4">
                            <label for="">Address 2</label>
                            <div class="p-2 border mb-4">{{ $users->address2 }}</div>
                            </div>
                            <div class="col-md-4">
                            <label for="">City</label>
                            <div class="p-2 border mb-4">{{ $users->city }}</div>
                            </div>
                            <div class="col-md-4">
                            <label for="">State</label>
                            <div class="p-2 border mb-4">{{ $users->state }}</div>
                            </div>
                            <div class="col-md-4">
                            <label for="">Country</label>
                            <div class="p-2 border mb-4">{{ $users->country }}</div>
                            </div>
                            <div class="col-md-4">
                            <label for="">Pin Code</label>
                            <div class="p-2 border mb-4">{{ $users->pincode }} </div>
                            </div>
                            @endif
                            @if ($users->role_as == '1')
                            <div class="col-md-4">
                                <label for=""> Name</label>
                                <div class="p-2 border mb-4">{{ $users->name }} </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Email</label>
                                <div class="p-2 border mb-4">{{ $users->email }} </div>
                            </div>
                            
                            @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
