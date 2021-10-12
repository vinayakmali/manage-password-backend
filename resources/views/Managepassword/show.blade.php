@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> View Password</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('managepassword.index') }}" title="Go back"> <i
                        class="fa fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Login URL:</strong>
                {{ $Managepassword->login_url }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                {{ $Managepassword->username }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            	<strong>Users:</strong>
            	<ul>
								@foreach($users as $user)
									<li>{{$user->name}}</li>
								@endforeach
							</ul>
						</div>
        </div>
        
    </div>
@endsection
