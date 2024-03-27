@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create a new advertisement</div>
            <div class="card-body">

                {!! Form::open(['route'=>'advertisement.store','method'=>'post','files' => true]) !!}

                @include('advertisement.form')
                <div class="form-group row mb-0"><div class="col-md-6 offset-md-4">
                        {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
                    </div></div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection


