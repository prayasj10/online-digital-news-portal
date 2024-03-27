@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">Edit tag</div>

            <div class="card-body">

                {!! Form::open(['route'=>['tag.update', $tag->id] ,'method'=>'patch','id'=>'tagform','files' => true]) !!}


                @include('tag.form')

                <div class="form-group row mb-0"><div class="col-md-6 offset-md-4">
                        {!! Form::submit('Edit',['class'=>'btn btn-primary']) !!}</div></div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection
