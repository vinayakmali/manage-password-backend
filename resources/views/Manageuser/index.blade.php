@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manage Users</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('manageuser.create') }}" title="Enter new URL"> <i class="fa fa-plus-circle"></i>
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
            <th>Name</th>
            <th>Email</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($Manageuser as $users)
        
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ date('d-m-Y', strtotime($users->created_at)) }}</td>
                <td>
                    <form action="{{ route('manageuser.destroy', $users->id) }}" method="POST">

                        <a href="{{ route('manageuser.show', $users->id) }}" title="show">
                            <i class="fa fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('manageuser.edit', $users->id) }}">
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
    
   {!! $Manageuser->links() !!}

@endsection
