
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
                        <h4 class="page-title">Add City</h4>
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
            
            <div class="container-fluid">
            <form class="form-horizontal form-material" action="{{url('save_city')}}" method="POST"  >
                                    <div class="form-group mb-4">
                                      @csrf
                                        <label class="col-md-12 p-0">Add City</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="city_name"
                                                class="form-control p-0 border-0"> </div>
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
        
    </div>
      
    
@endsection