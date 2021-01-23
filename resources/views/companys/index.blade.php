@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('companys.create') }}" title="Create a company"> <i class="fas fa-plus-circle"></i>
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
            <th>Adress</th>
            <th>Phone</th>
            <th>Legal Document</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($companys as $company)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->adress }}</td>
                <td>{{ $company->phone }}</td>
                <td>{{ $company->legal_document }}</td>
                <td>{{ date_format($company->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('companys.destroy', $company->id) }}" method="POST">

                        <a href="{{ route('companys.show', $company->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('companys.edit', $company->id) }}">
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

    {!! $companys->links() !!}

@endsection