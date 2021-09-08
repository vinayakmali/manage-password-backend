


@extends('layouts.app')


@section('content')
    

      <!-- Content Wrapper. Contains page content -->
  <div class="text-center">
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h2 class="business_name card-text"><strong>{{$business->business_name}}</strong></h2>
    <h3 class="business_cat">{{$business->cat_name}}</h3>
        <h3 class="business_service">{{$business->service_name}}</h3>
            <h3>Offerring consultency in Business</h3>
      
      <a href="/business/enquiry/{{$business->slug}}" class="btn btn-info">Book an Appointment</a>
      
      <div>

      <div class="address_label"></div> 
      <i class="fa fa-map-marker" aria-hidden="true"></i> Address
      <h3>{{$business->address_line}},{{$business->area}},{{$business->city}},{{$business->state}},{{$business->country}}</h3>
        
      </div>
                
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

      </div><!-- /.container -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

