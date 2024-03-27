@extends('layouts.navbar')

@section('content')

    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Active</div>

                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data" action="/user/{{$user->id}}">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <div class="col">
                                    Name: <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    Email: {{$user->email}}
                                </div>
                            </div>


                            <div class="form-group mb-3">
                                <label for="">Role:</label>
                                {!! Form::select('role', ['' => 'Select a role'] + $roles->all(), $user->role->id ?? null,['class' => 'form-control'], ['' => ['disabled']]) !!}

                                @error('role')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror

                            </div>

{{--                            @if($user->id == auth()->id())--}}
                            <div class="form-group row">
                                <div class="col">
                                    Password:  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    Confirm Password:  <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>

{{--                            @endif--}}

                            <label for="active"> Active </label>
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" id="status"
                                   name="status"
                                   value="1"
                                @if($user->status == 1)
                                    checked
                                @endif
                            >

                            <br>

                            <label for="image">Image:</label>

                            <input type="file" name="image" class="pb-4">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <br>
                            <button type="submit" class="btn btn-primary ">Save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form>
    </form>

@endsection
