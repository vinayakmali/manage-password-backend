@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12" style="text-align: center;">
            <div>
                <h2> {{ $business->business_name }}</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('business.index') }}" title="Go back"> <i
                        class="fas fa-backward "></i> Go back </a>
            </div>
        </div>
    </div>

      <!-- Content Wrapper. Contains page content -->
  <div class="text-center">
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <p class="card-text">Congratulations your online serivice booking page is live & ready to take bookings.</p>
                    <a href="/business/view/{{$business->slug}}" title="Go back">{{request()->getSchemeAndHttpHost()}}/business/view/{{$business->slug}} </a>
                    <h6>click on the below buttons to edit the page details. This is just the beginning of your exciting business journey!</h6>

                   <div> 
                    <a class="btn btn-primary" href="/business/{{$business->id}}/edit/" title="Go back" style="margin: 10px;width: 100%;"> Edit Business Info</a>
                    </div>
                   <div>
                      <a class="btn btn-primary" href="/service/create" title="Go back" style="margin: 10px;width: 100%;"> Add Business Services</a>
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
