@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}



            <div class="row justify-content-center">
							<div class="col manage_section">
								<a href="{{ route('managepassword.index') }}"><h2>Manage URL</h2></a>
							</div>
							<div class="col manage_section">
								<a href="{{ route('manageuser.index') }}"><h2>Manage Users</h2></a>
							</div>
						</div>
                </div>
<!-- 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome!
                </div> -->
            </div>
            
		
		
        </div>
    </div>
</div>

<style>
	.manage_section {
		height:150px;
		border:1px solid black;
		margin:5px;
		margin-top: 20px;
		background: lightgrey;
		text-align:center;
		display: flex;
		justify-content: center;
		align-content: center;
		flex-direction: column;
	}
</style>
@endsection
