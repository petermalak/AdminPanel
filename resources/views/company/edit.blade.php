@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit {{$company->name}} Data</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.update', $company->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="name" value="{{$company->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" value="{{$company->email}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="website" value="{{$company->website}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="file" name="logo" value="{{$company->logo}}" class="form-control">
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
