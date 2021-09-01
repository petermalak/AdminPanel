@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employees List<span class="float-right">
                    <a href="{{route('employees.create')}}" class="btn btn-primary btn-sm">Create Employee</a>
                </span></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>index</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $index=>$employee)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$employee->first_name}}</td>
                                            <td>{{$employee->last_name}}</td>
                                            <td>{{$employee->company->name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td><a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                                            <td>
                                                <form method="POST" action="{{ route('employees.destroy', $employee->id ) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{-- Pagination --}}
                                <div class="d-flex justify-content-center">
                                    {!! $employees->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
