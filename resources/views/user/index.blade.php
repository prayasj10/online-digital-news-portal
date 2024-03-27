@extends('layouts.navbar')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" id="session">
            {{ session('success') }}
        </div>
    @elseif(session('status'))
        <div class="alert alert-danger" id="session">
            {{ session('status') }}
        </div>
    @endif

    <div class="" id="success_message"></div>

    <div class="container">
        <div class="row pl-3">
            <h1>Users</h1>
        </div>

        <div class="row pl-3 pb-3">
            <a class="btn btn-success" href="/user/create" >Add new User</a>

        <form action="/user" method="GET" class="form-inline ml-3">
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
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
{{--            {{dd($users)}}--}}
            @forelse($users as $user)
{{--                @if($user->id != auth()->id())--}}
                @if($user->id != auth()->id() && $user->role->id != 2)


                    <tr>

                @if($user->image != null)
                    <td><img src="{{($user->image)}}" style="width: 50px;height: 50px"></td>
                @else
                <td><img src="/cms/user/defaultimage.png" style="width: 50px;height: 50px"></td>
                @endif

                    <td><a href="/user/{{$user->id}}">{{$user->name}}</a></td>

                    <td>{{$user->email}}</td>
{{--                <td>{{ !empty($user->role) ? $user->role->name:'' }}</td>--}}

                <td>
                    @if(!empty($user->role))
                    {{$user->role->name}}
                    @endif
                </td>



                <td>
                    <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-toggle="toggle"
                               data-onstyle="outline-success" data-offstyle="outline-danger"
                               data-on="Active" data-off="Inactive" {{$user->status ? 'checked' : ''}}>
                    </td>

                <td><a href="/user/{{$user->id}}/edit" class="btn btn-primary">edit</a></td>

                    <td>
                        <form action="/user/{{$user->id}}" method="post">
                            @method('DELETE')
                            @csrf

                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</button>

                        </form>
                    </td>

                </tr>
                @endif
            @empty
                  </table>
        <p class="pl-5">No user found</p>
            @endforelse

    </div>


@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $(document).ready(function($) {
            $(function () {
                $('.toggle-class').change(function () {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var id = $(this).data('id');

                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/changeStatus',
                        data: {
                            'status': status,
                            'id': id
                        },
                        success: function (data) {
                            console.log(data.success)
                            $('#success_message').html("");
                            $('#session').remove();
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(data.success);
                        }
                    })
                });
            });
        });
    </script>
@endpush
