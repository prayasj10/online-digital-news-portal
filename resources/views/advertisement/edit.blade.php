@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">Edit advertisement</div>

            <div class="card-body">

                {!! Form::open(['route'=>['advertisement.update', $advertisement->id] ,'method'=>'patch','files' => true]) !!}


                @include('advertisement.form')

                <div class="form-group row mb-0"><div class="col-md-6 offset-md-4">
                        {!! Form::submit('Edit',['class'=>'btn btn-primary']) !!}</div></div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection
