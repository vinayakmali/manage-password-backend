@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('business.index') }}" title="Go back"> <i
                        class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

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

    <form action="{{ route('business.update', $business->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

       
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
                   <form class="well form-horizontal">

                      <fieldset>
                         <div class="form-group">
                            <label >Business Name(required)</label>
                               <div class="input-group"><input id="fullName" name="business_name" placeholder="Business Name" class="form-control" required="true" value="{{$business->business_name}}" type="text"></div>
                         </div>
                        <div class="form-group">
                            <label for="disabledSelect">Business Type</label>
                            <div class="input-group">
                              <select id="disabledSelect" name="business_type" class="form-control">
                                <option @if(!empty($business->business_type == '1')){{ 'selected' }}@else-@endif value="1">Default</option>
                                <option @if(!empty($business->business_type == '2')){{ 'selected' }}@else-@endif value="2">Plumber</option>
                                <option @if(!empty($business->business_type == '3')){{ 'selected' }}@else-@endif value="3">Salon</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledSelect">Choose action Button(Required)</label>
                            <div class="input-group">
                              <select id="disabledSelect" name="business_action_button" class="form-control">
                                <option @if(!empty($business->business_action_button == '1')){{ 'selected' }}@else-@endif value="1">Book a Service Button</option>
                                <option @if(!empty($business->business_action_button == '2')){{ 'selected' }}@else-@endif value="2">Get a Free Quote</option>
                                <option @if(!empty($business->business_action_button == '3')){{ 'selected' }}@else-@endif value="3">Have Us Call You Back</option>
                                <option @if(!empty($business->business_action_button == '4')){{ 'selected' }}@else-@endif value="4">Book an Appointment</option>
                              </select>
                            </div>
                        </div>
                            <div class="input-group">
                                <label >Select Service</label>
                              <select id="disabledSelect" name="service_id[]" class="form-control" multiple="">
                            @foreach($service as $ser)
                                <option @if(!empty($business->service_id == $ser->id)){{ 'selected' }}@else-@endif value={{$ser->id}}>{{$ser->name}}</option>
                            @endforeach

                              </select>
                            </div>
                         <div class="form-group">
                            <label >Business Description(required)</label>
                               <div class="input-group">
                                <textarea class="form-control is-invalid" id="business_description" name="business_description" placeholder="Business Description" required>{{$business->business_description}}</textarea>
                            </div>
                         </div>

                        <div class="form-group">
                            <label for="disabledSelect">Your Business Address(Optional but recommended)</label>
                            <div class="input-group">
                                <input id="fullName" name="address_line" placeholder="Address Line 1" class="form-control"  value="{{$business->address_line}}" type="text">
                            </div>
                            <div class="input-group">
                                <input id="area" name="area" placeholder="Area" class="form-control"  value="{{$business->area}}" type="text">
                            </div>
                            <div class="input-group">
                                <input id="city" name="city" placeholder="City" class="form-control"  value="{{$business->city}}" type="text">
                            </div>
                            <div class="input-group">
                                <input id="state" name="state" placeholder="State" class="form-control"  value="{{$business->state}}" type="text">
                            </div>
                            <div class="input-group">
                              <select id="disabledSelect" name="country" class="form-control">
                                <option @if(!empty($business->country == 'IN')){{ 'selected' }}@else-@endif value="IN">India</option>
                                <option @if(!empty($business->country == 'US')){{ 'selected' }}@else-@endif value="US">US</option>
                                <option @if(!empty($business->country == 'eng')){{ 'selected' }}@else-@endif value="eng">England</option>
                              </select>
                            </div>
                        </div>

                        <div id="businessHoursContainer"></div>
                        <input type="text" id="businessHoursOutput" value="{{$business->working_hours}}" name="working_hours">

                      </fieldset>


                    <div class="form-group">
                        <label >Cover Photo</label>
                            <div class="input-group">
                                <input type="file" class="form-control-file" name="cover_photo" id="exampleInputFile">
                            </div>
                    </div>


                      <button type="submit" class="btn btn-info" id="btnSerialize">Update</button>

                   </form>
               
    </div>
    </form>


    <style type="text/css">
        .clean {
    clear: both;
}

.input-group input,.input-group select{
    width: 100% !important;
}
.dayContainer {
    float: left;
    line-height: 20px;
    margin-right: 8px;
    width: 65px;
    font-size: 11px;
    font-weight: bold;
}

.colorBox {
    cursor: pointer;
    height: 45px;
    border: 2px solid #888;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

.colorBox.WorkingDayState {
    border: 2px solid #4E8059;
    background-color: #8ade8f;
}

.colorBox.RestDayState {
    border: 2px solid #7a1c44;
    background-color: #de5962;
}

.operationTime .mini-time {
    width: 40px;
    padding: 3px;
    font-size: 12px;
    font-weight: normal;
}

.dayContainer .add-on {
    padding: 4px 2px;
}

.colorBoxLabel {
    clear: both;
    font-size: 12px;
    font-weight: bold;
}

.invisible {
    visibility: hidden;
}

.operationTime {
    margin-top: 5px;
}
    </style>
@endsection
