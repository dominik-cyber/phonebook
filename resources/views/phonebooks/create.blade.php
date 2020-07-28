@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Contact</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('phonebooks.index') }}"> Back</a>
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

<form action="{{ route('phonebooks.store') }}" method="POST">
    @csrf
     <div class="d-block row">
        <div class="mx-auto col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="mx-auto col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Last name:</strong>
                <input type="text" name="lastname" class="form-control" placeholder="Last name">
            </div>
        </div>
        <div class="mx-auto col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Company:</strong>
                <input type="text" name="company" class="form-control" placeholder="Company">
            </div>
        </div>
        <div class="mx-auto col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Mobile phone:</strong>
                <input type="text" name="mobile" class="form-control" placeholder="Mobile phone">
            </div>
        </div>
        <div class="mx-auto col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Mobile phone 2:</strong>
                <input type="text" name="mobile2" class="form-control" placeholder="Mobile phone 2">
            </div>
        </div>
        <div class="mx-auto col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Work phone:</strong>
                <input type="text" name="work" class="form-control" placeholder="Work phone">
            </div>
        </div>
        <div class="mx-auto col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Work phone2:</strong>
                <input type="text" name="work2" class="form-control" placeholder="Work phone">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
