@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Employee</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.store') }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="E-Mail">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <select name="company_id" id="company_id" class="form-control">
                                    <option value=""> -- Select One --</option>
                                    @foreach ($companies as $company)
                                        <option name="company_id" value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
