@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit {{$employee->name}} Data</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="first_name" value="{{$employee->first_name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" value="{{$employee->last_name}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" value="{{$employee->email}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" value="{{$employee->phone}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <select name="company_id" id="company_id" class="form-control">
                                    <option value="{{$employee->company->id}}">{{$employee->company->name}}</option>
                                    @foreach ($companies as $company)
                                        <option name="company_id" value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
