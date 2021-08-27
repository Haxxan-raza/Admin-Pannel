@extends('admin.master')
@section('content')
        <div class="page-wrapper">
                    <div class="page-breadcrumb bg-white">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                             <h4 class="page-title">Login User Details</h4>
                             </div>
                               <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                <div class="d-md-flex">
                                  <ol class="breadcrumb ms-auto">
                                    <li><a href="#" class="fw-normal">Dashboard</a></li>
                                     </ol>
                                     <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                                        class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                                        to Pro</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    @if(session()->has('status'))
    <div class="alert alert-success">
        {{ session()->get('status') }}
    </div>
@endif
                    <div class="container-fluid">
                        <div class="row">
                        <table class="table text-nowrap">
                                        <thead>
                                                   <tr>
                                                    <th class="border-top-0">No.</th>
                                                    <th class="border-top-0">Profile</th>
                                                    <th class="border-top-0">Descripition</th>
                                                    <th class="border-top-0">City Name</th>
                                                    <th class="border-top-0">Age Group</th>
                                                    <th class="border-top-0">Action</th>
                                                   </tr>
                                        </thead>
                                            <tbody>
                                                @foreach($profiles as $data)
                                                    <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <!-- <td>{{$data->id}}</td> -->
                                                    <td>
                                <div class="col-lg-4 col-xlg-3 col-md-12">
                                    <div class="white-box">
                                    <div class="user-bg"> <img width="100%" alt="user" src="{{ asset ('profileImages/'.$data->profile) }}">
                                        <div class="overlay-box">
                                            <div class="user-content">
                                                <a href="javascript:void(0)"><img src="{{ asset ('profileImages/'.$data->profile) }}"
                                                        class="thumb-lg img-circle" alt="img"></a>
                                                <h4 class="text-white mt-2">{{Auth::user()->name}}</h4>
                                                <!-- <h5 class="text-white mt-2">info@myadmin.com</h5> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                    </td>
                                                    <td>{{$data->descripition}}</td><br>
                                                    <td>{{$data->city_name}}</td>
                                                    <td>{{$data->agegroup}}</td>
                                                    <td><a href="{{url('editprofile/'.$data->id)}}" class="btn btn-primary btn-sm">Edit </a></td>
                                                    <!-- <td><a href = '{{"deleteprofile/". $data->id }}'class="btn btn-danger btn-sm">Delete</a></td> -->
                                                <form action="{{ route('deleterecord', $data->id)}}" method="post">
                                                            @method("delete")
                                                            @csrf
                                                    <td><input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure to delete this?')"/></td>
                                                </form> 
                                               
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