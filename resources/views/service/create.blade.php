@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Service</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('service.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
    <form action="{{ route('service.store') }}" method="POST" >
        @csrf


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Timeline(In hr):</strong>
                    <input type="number" name="timeline" class="form-control" placeholder="Timeline" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="number" name="amount" class="form-control" placeholder="Amount" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select Category:</strong>
                    <select id="disabledSelect" name="category" class="form-control">
                        @foreach($category as $cat)
                            <option value='{{ $cat->id }}'  >{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>    

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select Type:</strong>

                    <select id="disabledSelect" name="type" class="form-control">
                            <option value='per_person'  >Per Person</option>
                            <option value='per_campaign'  >Per Campaign</option>
                    </select>
                </div>
            </div>    


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
