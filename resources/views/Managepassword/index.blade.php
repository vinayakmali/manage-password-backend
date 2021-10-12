@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manage URL and Password </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('managepassword.create') }}" title="Enter new URL"> <i class="fa fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>S.No</th>
            <th>Login URL</th>
            <th>username</th>
            <th>userids</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($Managepassword as $manage)
        
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $manage->login_url }}</td>
                <td>{{ $manage->username }}</td>
                <td>{{ $manage->userids }}</td>
                <td>{{ date('d-m-Y', strtotime($manage->created_at)) }}</td>
                <td>
                    <form action="{{ route('managepassword.destroy', $manage->id) }}" method="POST">

                        <a href="{{ route('managepassword.show', $manage->id) }}" title="show">
                            <i class="fa fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('managepassword.edit', $manage->id) }}">
                            <i class="fa fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fa fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    
    <style>
    	svg {
    		height: 20px;
    	}
    	
    	.text-sm {
    		margin-top: 15px;
    	}
    </style>
    
   {!! $Managepassword->links() !!}

@endsection
