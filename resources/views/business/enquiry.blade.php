@extends('layouts.guest')


@section('content')



<div class="container form-conatainer">
  <div class="row">
  <div class="col-xs-12" style="padding-right:0px;padding-left:0px;">
    <div class="col-md-10 col-xs-12 col-md-offset-1">
 
      <!-- multistep form -->
      <form class="form-horizontal form" id="msform" method="POST" action="" enctype="multipart/form-data">
        <!-- progressbar -->
        <ul id="progressbar">
          <li class="active">Step One</li>
          <li>Step Two</li>
          <li>Step Three</li>
          <li>Final Step</li>
        </ul>
        
        <div id="sucessmsg" style="display:none;"><h2 class="fs-subtitle" style="color: #dc3c52; font-size:22px; text-align:center;">Form Submitted Successfully</h2></div>
        <div id="errormsg" style="display:none;"><h2 class="fs-subtitle" style="color: #dc3c52; font-size:22px; text-align:center;">Oops.. Something wrong.</h2></div>
        
      <!-- fieldsets -->
      <fieldset id="step1">
        <div>
          <!-- Main content -->
          <div class="content">
            <div class="container">
              <h2 class="fs-title">Choose a Service</h2>
              <h5 class="book-title"> Book an Appointment</h5>
              <input type="hidden" name="business_id" value="{{$business->id}}">
              <input type="hidden" name="slug" value="{{$business->slug}}">
              
              @foreach($allservices as $ser)
              <div class="col-md-12 service-custom">
                <div class="col-md-8 left">
                  <h5>{{$ser->name}}</h5>
                  <span class="hours">{{$ser->timeline}} Hours | @if(!empty($ser->amount == 0)){{ 'Free' }}@else {{$ser->amount}} Rs. @endif</span>
                </div>
                <div class="col-md-4 right">  
                  <label class="checkstyle">
                    <input type="radio" name="service_id" required value="{{$ser->id}}">
                    <span class="checkmark"></span>
                  </label>
                </div>
                </div> 
              @endforeach      

            </div>
          </div>
        </div>
      <input style="float:right;" type="button" id="stepone" name="next" class="next action-button" value="Next" />
      </fieldset>
        
        <fieldset id="step2">
          <h2 class="fs-title">Select Date and Time</h2>
            <div class="row" style="margin-top: 100px;">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                                <input type="text" required class="form-control datetimepicker" name="selected_date">
                    </div>
                </div>
            </div>
        
            <input type="button" name="previous" id="previous1" class="previous action-button" value="Previous" />
            <input style="float:right;" type="button" id="steptwo" name="next" class="next action-button" value="Next" />
        </fieldset>
        
        
        <fieldset id="step3">
          <h2 class="fs-title">Add your details</h2>
          <div class="form-group required">
            <label class="control-label col-sm-2">Your Name(Required): </label>
            <div class="col-sm-10">
              <input type="text" name="name" required />
           </div>
         </div>
         
         <div class="form-group required">
            <label class="control-label col-sm-2">Email Id(Required): </label>
            <div class="col-sm-10">
              <input type="text" name="email" required/>
           </div>
         </div>
          <input type="button" name="previous"  id="previous2" class="previous action-button" value="Previous" />
          <input style="float:right;" type="submit" id="stepfour" name="submit" class="submitbutton" value="Submit" />
        </fieldset>        
      </form>
</div>
</div>
</div>      
</div>


<fieldset id="step4" style="display:none;">
      <!-- Content Wrapper. Contains page content -->
  <div class="text-center thank-you" >
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-text">Your request has been subimtted successfully.</h4>
                    <h3>{{$business->business_name}}</h3>
                    <h6 class="grey-title">{{$business->cat_name}}</h6>
                   <div> 
                    <h4 class="enquiry_date"></h4>
                    </div>
                   <div>
                    <h5 class="grey-title">Copy of email Sent to</h5>
                    <h4 class="enquiry_email"></h4>

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
</fieldset>

    <script type="text/javascript">
        $(function () {
            $('.datetimepicker').datetimepicker();
        });
    </script>

@endsection
