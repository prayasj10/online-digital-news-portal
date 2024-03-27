@extends('layouts.navbar')

@section('content')

    @if (session('success'))
        <div class="alert alert-success" id="session">
            {{ session('success') }}
        </div>
    @elseif(session('warning'))
        <div class="alert alert-warning pl-2" id="session">
            {{ session('warning') }}
        </div>
    @elseif(session('status'))
        <div class="alert alert-danger" id="session">
            {{ session('status') }}
        </div>
    @endif

    <div class="" id="success_message"></div>

    <div class="container">
        <div class="row pl-3">
            <h1>Authors</h1>
        </div>

        <div class="row pl-3 pb-3">
            @can('create', \App\Customer::class)

            <a class="btn btn-success" href="/author/create" >Add new author</a>

            @endcan

            <form action="/author" method="GET" class="form-inline ml-3">
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
        <thead>
            <tr>
                <th></th>
                <th>id</th>
                <th>Name</th>
                <th>Facebook link</th>
                <th>Twitter link</th>
                <th>Published</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
            <tbody id="sortable">

            @foreach($authors as $author)
            <tr class="row1" data-id="{{$author->id}}">
                <td><i class="fa fa-arrows" aria-hidden="true"></i> </td>

                <td>{{$author->id}}</td>

                <a href="/author/{{$author->id}}"></a>

                    <td>{{$author->name}}</td>

                    <td>{{$author->facebook}}</td>

                    <td>{{$author->twitter}}</td>


            @can('update',$author)

                    <td>
                        <input data-id="{{$author->id}}" class="toggle-class" type="checkbox" data-toggle="toggle"
                               data-onstyle="outline-success" data-offstyle="outline-danger"
                               data-on="Published" data-off="Unpublished" {{$author->published ? 'checked' : ''}}>
                    </td>
                @endcan
                @cannot('update',$author)

                    <td>
                        @if($author->published == 1)
                            <button class="btn btn-success">Published</button>
                        @else
                            <button class="btn btn-danger">Unpublished</button>
                        @endif
                    </td>
                @endcannot
                @can('update',$author)

                <td><a href="/author/{{$author->id}}/edit" class="btn btn-primary">edit</a></td>

                @endcan
                @can('delete',$author)

                <td>
                        {!! Form::open(['route'=>['author.destroy',$author->id],'method'=>'delete']) !!}

                        {!! Form::submit('delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure?')"]) !!}

                        {!! Form::close() !!}
                </td>
                @endcan
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <div class="pl-lg-5">
    {{ $authors->links() }}
    </div>

@endsection


@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script>
        $(document).ready(function($) {
            $(function () {
                $('.toggle-class').change(function () {
                    var published = $(this).prop('checked') == true ? 1 : 0;
                    var id = $(this).data('id');

                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/changeAuthorPublished',
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


            $( function() {
                $( "#sortable" ).sortable({
                    items: "tr",
                    cursor: 'move',
                    opacity: 0.6,
                    update: function (){
                        saveNewPositions();
                    }
                });
            } );

            function saveNewPositions(){
                var position = [];
                $('tr.row1').each(function(index,element) {
                    position.push({
                        id: $(this).attr('data-id'),
                        position: index + 1,
                    });
                });

                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });

                $.ajax({
                    url:"/author/sortable",
                    type: "POST",
                    dataType: "json",
                    data: {
                        position:position,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response){
                            console.log(response.success);
                        $('#success_message').html("");
                        $('#session').remove();
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.success);
                    }
                });
            }

        });
    </script>
@endpush



