@extends('layouts.navbar')

@section('content')

    @if (session('success'))
        <div class="alert alert-success pl-2"  id="session">
            {{ session('success') }}
        </div>
    @elseif(session('warning'))
        <div class="alert alert-warning pl-2" id="session">
            {{ session('warning') }}
        </div>
    @elseif(session('status'))
        <div class="alert alert-danger pl-2" id="session">
            {{ session('status') }}
        </div>
    @endif

    <div class="" id="success_message"></div>


    <div class="container">
        <div class="row pl-3">
            <h1>Category</h1>
        </div>

        <div class="row pl-3 pb-3">
            @can('create', \App\Customer::class)

            <a class="btn btn-success" href="/category/create" >Add new category</a>
            @endcan

            <form action="/category" method="GET" class="form-inline ml-3">
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
                <th>Slug</th>
                <th>Published</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($categories as $category)
            <tr>
                    <td>{{$category->id}}</td>

                <a href="/category/{{$category->id}}">
                    <td>{{$category->name}}</td>

                    <td>{{$category->slug}}</td>

                    @can('update',$category)

                    <td>
                        <input data-id="{{$category->id}}" class="toggle-class" type="checkbox" data-toggle="toggle"
                               data-onstyle="outline-success" data-offstyle="outline-danger"
                               data-on="Published" data-off="Unpublished" {{$category->published ? 'checked' : ''}}>
                    </td>
                    @endcan
                    @cannot('update',$category)

                        <td>
                            @if($category->published == 1)
                                <button class="btn btn-success">Published</button>
                            @else
                                <button class="btn btn-danger">Unpublished</button>
                            @endif
                        </td>
                    @endcannot
                    @can('update',$category)

                <td><a href="/category/{{$category->id}}/edit" class="btn btn-primary">edit</a></td>
                    @endcan
                    @can('delete',$category)

                    <td>
                        {!! Form::open(['route'=>['category.destroy',$category->id],'method'=>'delete']) !!}

                        {!! Form::submit('delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure?')"]) !!}

                        {!! Form::close() !!}
                </td>
                @endcan

            @endforeach

        </table>
    </div>


@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function($) {
            $(function () {
                $('.toggle-class').change(function () {
                    var published = $(this).prop('checked') == true ? 1 : 0;
                    var id = $(this).data('id');

                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/changeCategoryPublished',
                        data: {
                            'published': published,
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




