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
            <h1>Advertisement</h1>
        </div>

        <div class="row pl-3 pb-3">
{{--            @can('create', \App\advertisement::class)--}}

            <a class="btn btn-success" href="/advertisement/create" >Add new advertisement</a>

{{--            @endcan--}}

{{--            <form action="/advertisement" method="GET" class="form-inline ml-3">--}}
{{--                <div class="input-group input-group-sm">--}}
{{--                    <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-navbar" type="submit">--}}
{{--                            <i class="fas fa-search"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

        </div>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Advertisement</th>
                <th colspan="3">Display</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
            <th> </th>
                <th></th>
                <th></th>
                <th>Home Page</th>
                <th>Listing Page</th>
                <th>Detail Page</th>
                <th></th>
                <th></th>
            </tr>
            @forelse($advertisements as $advertisement)
                <tr>
                    <td>{{$advertisement->id}}</td>

                        <td>{{$advertisement->name}}</td>

                    @if(isset($advertisement->image))
                        <td><img src="{{$advertisement->image}}" style="height: 100px;width:450px"></td>
                    @else
                        <td><img src="frontend/advertisement/defaultadvertisement.jpg" style="width: 450px;height: 100px"></td>
                    @endif

                        <td>
                            @if($advertisement->page1 == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            @if($advertisement->page2 == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            @if($advertisement->page3 == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>


{{--                    @can('update',$advertisement)--}}
{{--                        <td>--}}
{{--                            <input data-id="{{$advertisement->id}}" class="toggle-class" type="checkbox" data-toggle="toggle"--}}
{{--                                   data-onstyle="outline-success" data-offstyle="outline-danger"--}}
{{--                                   data-on="Published" data-off="Unpublished" {{$advertisement->published ? 'checked' : ''}}>--}}
{{--                        </td>--}}
{{--                    @endcan--}}
{{--                    @cannot('update',$advertisement)--}}
{{--                        <td>--}}
{{--                            @if($advertisement->published == 1)--}}
{{--                                <button class="btn btn-success">Published</button>--}}
{{--                            @else--}}
{{--                                <button class="btn btn-danger">Unpublished</button>--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                    @endcannot--}}



{{--                    @can('update',$advertisement)--}}

                    <td><a href="/advertisement/{{$advertisement->id}}/edit" class="btn btn-primary">edit</a></td>

{{--                    @endcan--}}
{{--                    @can('delete',$advertisement)--}}

                    <td>
                            {!! Form::open(['route'=>['advertisement.destroy',$advertisement->id],'method'=>'delete']) !!}

                            {!! Form::submit('delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure?')"]) !!}

                            {!! Form::close() !!}
                        </td>
{{--                    @endcan--}}


                </tr>
        @empty
        </table>

        <p>No advertisements Found</p>
        @endforelse

    </div>


@endsection


@push('scripts')

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

{{--    <script>--}}
{{--        $(document).ready(function($) {--}}
{{--            $(function () {--}}
{{--                $('.toggle-class').change(function () {--}}
{{--                    var published = $(this).prop('checked') == true ? 1 : 0;--}}
{{--                    var id = $(this).data('id');--}}

{{--                    $.ajax({--}}
{{--                        type: "GET",--}}
{{--                        dataType: "json",--}}
{{--                        url: '/changeadvertisementPublished',--}}
{{--                        data: {--}}
{{--                            'published': published,--}}
{{--                            'id': id--}}
{{--                        },--}}
{{--                        success: function (data) {--}}
{{--                            console.log(data.success)--}}
{{--                        }--}}
{{--                    })--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endpush

