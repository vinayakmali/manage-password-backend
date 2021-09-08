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

    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


  <!-- Content Wrapper. Contains page content -->
  <div class="text-center">
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h1>Add your email address & you're done</h1>
                <p class="card-text">Don't worry, you can customize your business info and services after this step. FrontSeves will send one time verification link to below email, you can verify account within 24 hours.</p>

                <!-- Form Element sizes -->
                <form action="{{ route('business.update', $business->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <input type="hidden" value="end" name="next">
                  <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter Email" required>
                  <br>
                  <button type="submit" class="btn btn-primary btn-block">Publish your service booking page</button>
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