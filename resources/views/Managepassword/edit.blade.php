@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Password</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('managepassword.index') }}" title="Go back"> <i
                        class="fa fa-backward "></i> </a>
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

    <form action="{{ route('managepassword.update', $Managepassword->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Login URL:</strong>
                    <input type="text" name="login_url" value="{{ $Managepassword->login_url }}" class="form-control" placeholder="Login URL">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username:</strong>
										<input type="text" name="username" value="{{ $Managepassword->username }}" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="Password"
                        value="{{ $Managepassword->password }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User id's:</strong>
                        
										<select name="userids[]" class="form-control" placeholder="User Id's" multiple>
										
										
											@foreach ($users as $user)
												@if (in_array($user->id, explode(",",$Managepassword->userids)))
													@php
															 $selected = 'selected="selected"';
													@endphp
												@else
													@php
															 $selected = '';
													@endphp
												@endif
												
												<option {{$selected}} value="{{$user->id}}">{{$user->name}}</option>
											@endforeach
											
										</select>
										
										
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
    
    <style>
		select option[selected] {
			background: rgba(150, 150, 150, 0.3);
		}
		</style>
		
		
@endsection
