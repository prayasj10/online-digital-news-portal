@extends('layouts.navbar')

@section('content')


    <div class="container">
        <div class="card">
            <div class="card-header">Create a new author</div>
                <div class="card-body">

                            {!! Form::open(['route'=>'author.store','method'=>'post']) !!}

                             @include('author.form')
                                <div class="form-group row mb-0"><div class="col-md-6 offset-md-4">
                            {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
                                </div></div>

                            {!! Form::close() !!}

                </div>
        </div>
    </div>
@endsection
