@extends('admin.master')
@section('content')
<div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="*" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                                to Pro</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                   
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <h4>Edit & Update Profile
                        <a href="{{ url('recorddisply') }}" class="btn btn-danger float-end">BACK</a>
                             </h4>
                                <form class="form-horizontal form-material" action="{{url('updateprofile/'.$allprofiles->id)}}" method="POST" enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        @csrf
                                      <!-- @method('put') -->
                                        <div class="overlay-box">
                                            <div class="user-content">
                                                <a href="javascript:void(0)"><img src="{{ asset ('profileImages/'.$allprofiles->profile) }}"
                                                        class="thumb-lg img-circle" alt="img"></a>
                                                        <input type="file" name="profile" value=""
                                                class="form-control p-0 border-0">
                                                <!-- <h4 class="text-white mt-2">{{Auth::user()->name}}</h4> -->
                                                <!-- <h5 class="text-white mt-2">info@myadmin.com</h5> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Message</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea rows="5" name="descripition" value="" class="form-control p-0 border-0">{{$allprofiles->descripition}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Select City</label>

                                        <div class="col-sm-12 border-bottom">
                                       
                                     <select class="form-select shadow-none p-0 border-0 form-control-line" name="city_name" value="{{$allprofiles->city_name}}">
                                            
                                            @foreach($cities as $item)
                                       <option value="{{$item->city_name}}">{{$item->city_name}}</option>
                                       @endforeach
                                     </select>                                         
    
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Select Age</label>
                                        <div class="col-sm-12 border-bottom">
                                         <select class="form-select shadow-none p-0 border-0 form-control-line" name="agegroup" value="{{$allprofiles->agegroup}}">
                                            @foreach($agegroups as $item)
                                            <option value="{{$item->agegroup}}">{{$item->agegroup}}U</option>
                                            @endforeach
                                         </select> 
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
        </div>      
    </div>
      
    
@endsection