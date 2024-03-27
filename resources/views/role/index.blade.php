@extends('layouts.navbar')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="row pl-3">
            <h1>Roles</h1>
        </div>

        <div class="row pl-3 pb-3">
            <a href="/role/create" class="btn btn-success">Add new role</a>

            <form action="/role" method="GET" class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        @if (isset($_GET['search']))
                            <a class="clear-search" href="/post" title="Clear Filter">Clear Filter</a>
                        @endif
                    </div>
                </div>
            </form>

        </div>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Permissions</th>
                <th></th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>

                        <td><a href="/role/{{$role->id}}">{{$role->name}}</a></td>

                    <td>
                        @foreach($role->permissions as $permission)
                            {{$permission->name}},
                        @endforeach
                    </td>

                        <td><a href="/role/{{$role->id}}/edit" class="btn btn-primary">edit</a></td>

                        <td>
                            {!! Form::open(['route'=>['role.destroy',$role->id],'method'=>'delete']) !!}

                            {!! Form::submit('delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure?')"]) !!}

                            {!! Form::close() !!}
                        </td>


                </tr>
            @endforeach

        </table>
    </div>


@endsection


@push('scripts')
@endpush

