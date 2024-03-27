@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Details</div>

                    <div class="card-body">

                        @if($user->image != null)
                            <img src="{{$user->image}}" style="width: 100px;height: 100px">

                        @else
                            <img src="/cms/user/defaultimage.png" style="width: 100px;height: 100px">
                        @endif

                        <div class="form-group row">
                            <div class="col">
                                Name: {{$user->name}}
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col">
                                Email: {{$user->email}}
                            </div>
                        </div>


                            <div class="form-group row">
                                <div class="col">
                                    Status :
                                    @if($user->status == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </div>
                            </div>

                            <a href="/user/{{$user->id}}/edit">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
