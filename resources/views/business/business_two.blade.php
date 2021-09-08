 @extends('layouts.app')

@section('content')
    <!-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('business.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div> -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


 <!-- Content Wrapper. Contains page content -->
  <div class="text-center">

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h1>What type of business do you run?</h1>
                <p class="card-text">Select one of the below business type. In case you couldn't find your business type, select 'Blank'</p>

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <form action="{{ route('business.update', $business->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="business_type" value="1"> 
                          <input type="hidden" value="three" name="next">
                          
                          <button type="submit" class="btn btn-block small-box bg-info">
                              <div class="inner">
                                  <p>&nbsp;</p>
                                  <h4>Blank</h4>
                              </div>
                          </button>
                        </form>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <form action="{{ route('business.update', $business->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="business_type" value="2">
                          <input type="hidden" value="three" name="next">

                          <button type="submit" class="btn btn-block small-box bg-info">
                              <div class="inner">
                                  <p>&nbsp;</p>
                                  <h4>Plumber</h4>
                              </div>
                          </button>
                        </form>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <form action="{{ route('business.update', $business->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="business_type" value="3">
                          <input type="hidden" value="three" name="next">
                          <button type="submit" class="btn btn-block small-box bg-info">
                              <div class="inner">
                                  <p>&nbsp;</p>
                                  <h4>Salon</h4>
                              </div>
                          </button>
                        </form>
                    </div>
                    <!-- ./col -->

                </div>
                <!-- /.row -->
                
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