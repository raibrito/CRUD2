@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employers.create') }}" title="Create a employer"> <i class="fas fa-plus-circle"></i>
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
            <th>Sector</th>
            <th>Occupation</th>
            <th>Department</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employers as $employer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $employer->name }}</td>
                <td>{{ $employer->sector }}</td>
                <td>{{ $employer->occupation }}</td>
                <td>{{ $employer->department }}</td>
                <td>{{ date_format($employer->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('employers.destroy', $employer->id) }}" method="POST">

                        <a href="{{ route('employers.show', $employer->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('employers.edit', $employer->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

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

    {!! $employers->links() !!}

@endsection