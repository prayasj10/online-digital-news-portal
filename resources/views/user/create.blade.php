@extends('layouts.navbar')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Create a new user</div>

                    <div class="card-body">
{{--                        <form method="POST" action="/user">--}}
                            {!! Form::open(['route'=>'user.store','method'=>'post']) !!}
{{--                            @csrf--}}

                            <div class="form-group row">
                                {!! Form::label('name','NAME',['class'=>'col col-form-label text-md-right']) !!}
{{--                                <label for="name" class="col col-form-label text-md-right">Name</label>--}}

                                <div class="col-md-6">
                                    {!! Form::text('name',null,['class'=>'form-control','autofocus']) !!}
{{--                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"autocomplete="name" autofocus>--}}


                                    @error('name')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('email','E-Mail Address',['class'=>"col col-form-label text-md-right"]) !!}
{{--                                <label for="email" class="col col-form-label text-md-right">E-Mail Address</label>--}}

                                <div class="col-md-6">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">

                            {!! Form::label('role','Role',['class'=>'col col-form-label text-md-right']) !!}

                            <div class="col-md-6">

                                {!! Form::select('role', ['' => 'Select a role'] + $roles->all(), $user->role->id ?? null,['class' => 'form-control'], ['' => ['disabled']]) !!}


                            @error('role')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            </div>
                        </div>

                            <div class="form-group row">
                                <label for="password" class="col col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="active" class="col text-md-right"> Active </label>
                            <input type="hidden" name="status" value="0">
                            <div class="col-md-6">

                            <input type="checkbox" id="status"
                                   name="status"
                                   value="1"
                                   @if($user->status == 1)
                                   checked
                                @endif
                            >
                            </div>
                        </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        Create--}}
{{--                                    </button>--}}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
