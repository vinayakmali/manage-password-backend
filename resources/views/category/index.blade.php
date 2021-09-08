@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Business Service Category Listing </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
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
            <th>No</th>
            <th>Name</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($category as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('category.destroy', $project->id) }}" method="POST">

                        <a href="{{ route('category.show', $project->id) }}" title="show">
                         Show
                        </a>

                        <a href="{{ route('category.edit', $project->id) }}">
                          Edit
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $category->links() !!}

@endsection
