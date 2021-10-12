@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome!
                </div>
            </div>
            
            <div class="row justify-content-center">
							<div class="col manage_section">
								<a href="{{ route('managepassword.index') }}"><h2>Manage URL</h2></a>
							</div>
							<div class="col manage_section">
								<a href="{{ route('manageuser.index') }}"><h2>Manage Users</h2></a>
							</div>
						</div>
		
		
        </div>
    </div>
</div>

<style>
	.manage_section {
		height:200px;
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

<script type="text/javascript">

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function() {
  if(this.readyState === 4) {
    var res = this.responseText;
    const obj = JSON.parse(res);

    let username = obj.result[0].username;
    let password = obj.result[0].password;

console.log(username)

  }
});

xhr.open("GET", "http://127.0.0.1:8000/getpassword");
xhr.setRequestHeader("Cookie", "XSRF-TOKEN=eyJpdiI6ImwwSmxHWnZhRDRZSy9MSUhVTjRYT0E9PSIsInZhbHVlIjoiNDBRbDhxTmpvQnpmQVlXSlR1d29HT0N4M0taNFRtcXprTlNiM25IVTRiRUp0UWdNbGxiS2xGaDBORXhwMU5GVSt4eUkrSVVYL29mTnl4UnhEUVlYQXZibmJ0Tjc4U0oyQTR1QnpyQ1h3cTV1WVBONFJGUG54NS9IQVhQR3U1L3IiLCJtYWMiOiIwOWI3MzE3ZGE5YmE0MDhjZTE1NzQ1OGI4NzgxMjgyY2I1ZTFiM2VhZjM1ZjY1ZTA4ODFhMGEyN2E5ZjJjYTJkIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjFvV1M4Nk1PR0Z3cERBdFM5WHorTlE9PSIsInZhbHVlIjoidjJIY01QSXdSSVBxUHNsWk1UU2ViYzhHK3FiZlpLT3lWY3VDdEZ1RmxyblRwekdrcVk5UkluMXlzb0pUejlib2t5TEUySVRrbUhqTlZ1UEEzaTNYWGVFd01sM1NodFBaS3V5KzlKeWIyYm45aE83aytYbE5nUWZMSTUxTTZIeGsiLCJtYWMiOiIwZDc5YWRlNTY4MTE0NGViMTc1ZGU2MzlhNWI0MWI4ZTRhY2U4NzZhYjVmODQ4NTY0Njc2ZGY3NTk3ZDgwNWUxIiwidGFnIjoiIn0%3D");

xhr.send();


</script>