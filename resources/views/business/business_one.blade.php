@extends('layouts.app')

@section('content')


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
  <div class=" text-center">

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h1>What your business name?</h1>
                <p class="card-text">If you are running your personal brand, just add your name. We will use your business name to create an url, so nake sure to add it correctly.</p>

                <!-- Form Element sizes -->
                    <form action="{{ route('business.store') }}" method="POST" >
                    @csrf
                  <input class="form-control form-control-lg" type="text" name="business_name" placeholder="Please Enter Business Name" required>
                  <input type="hidden" value="two" name="next">
                  <br>
                  <button type="submit" class="btn btn-primary btn-block">Next</button>
                  <!-- /.row -->
                </form>
                
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
