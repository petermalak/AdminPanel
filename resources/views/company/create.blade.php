@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Company</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="E-Mail">
                            </div>
                            <div class="form-group">
                                <input type="text" name="website" class="form-control" placeholder="Website">
                            </div>
                            <div class="form-group">
                                <input type="file" name="logo" class="form-control" placeholder="logo">
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
