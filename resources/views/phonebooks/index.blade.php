@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Phonebook</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('phonebooks.create') }}"> Create New Contact</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-sm table-hover table-responsive">
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Mobile phone</th>
            <th>Mobile phone 2</th>
            <th>Work phone</th>
            <th>Work phone 2</th>
            <th width="200px">Action</th>
        </tr>
        @foreach ($phonebooks as $phonebook)
        <tr>
            <td>{{ $phonebook->name }}</td>
            <td>{{ $phonebook->lastname }}</td>
            <td>{{ $phonebook->company }}</td>
            <td>{{ $phonebook->mobile }}</td>
            <td>{{ $phonebook->mobile2 }}</td>
            <td>{{ $phonebook->work }}</td>
            <td>{{ $phonebook->work2 }}</td>
            <td>
                <form action="{{ route('phonebooks.destroy',$phonebook->id) }}" method="POST">

                    <a class="btn btn-sm btn-primary" href="{{ route('phonebooks.edit',$phonebook->id) }}"><i class="fas fa-edit"></i> Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $phonebooks->links() !!}

@endsection
