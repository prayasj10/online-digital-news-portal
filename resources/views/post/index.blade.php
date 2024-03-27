@extends('layouts.navbar')

@section('content')
    @if (session('success'))
        <div class="alert alert-success"  id="session">
            {{ session('success') }}
        </div>
    @elseif(session('status'))
        <div class="alert alert-danger"  id="session">
            {{ session('status') }}
        </div>
    @endif

    <div class="" id="success_message"></div>


    <div class="container">
        <div class="row pl-3">
            <h1>News</h1>
        </div>

        <div class="row pl-3 pb-3">
            @can('create', \App\Post::class)

            <a class="btn btn-success" href="/post/create" >Add new post</a>

            @endcan

            <form action="/post" method="GET" class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
{{--                        <a href="/post">clear filter</a>--}}
                        @if (isset($_GET['search']))
                            <a class="clear-search" href="/post" title="Clear Filter">Clear Filter</a>
                        @endif
                    </div>
                </div>
            </form>

        </div>
        <table class="table" >
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th></th>
                <th>Content</th>
                <th>Published</th>
                <th>Author</th>
                <th></th>
                <th>Category</th>
                <th>Tag</th>
                <th>Award Category</th>
                <th>Award Name</th>
                <th></th>
            </tr>
            @forelse($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>

                        <td>{{$post->title}}</td>

                    @if(isset($post->image))
                        <td><img src="{{$post->image}}" style="height: 100px;width:150px"></td>
                    @else
                        <td><img src="/frontend/posts/defaultPostImage.jpg" style="width: 150px;height: 100px"></td>
                    @endif

                        <td>{!! $post->content !!}</td>


                    @can('update',$post)
                        <td>
                            <input data-id="{{$post->id}}" class="toggle-class" type="checkbox" data-toggle="toggle"
                                   data-onstyle="outline-success" data-offstyle="outline-danger"
                                   data-on="Published" data-off="Unpublished" {{$post->published ? 'checked' : ''}}>
                        </td>
                    @endcan
                    @cannot('update',$post)
                        <td>
                            @if($post->published == 1)
                                <button class="btn btn-success">Published</button>
                            @else
                                <button class="btn btn-danger">Unpublished</button>
                            @endif
                        </td>
                    @endcannot

                    <td>
                        {{$post->author->name}}
                    </td>

                    <td>
                        @if(isset($post->author->facebook))
                            <a href="{{$post->author->facebook}}"><img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" style="height:30px"></a>
                        @endif

                            @if(isset($post->author->twitter))
                                <a href="{{$post->author->twitter}}"><img src="data:image/png;base64,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" style="height:30px"></a>
                            @endif

                    </td>

                    <td>
                        @foreach($post->categories as $category)
                            {{$category->name}}<br>
                        @endforeach
                    </td>


                    <td>
                        @foreach($post->tags as $tag)
                            {{$tag->name}}<br>
                        @endforeach
                    </td>

                    <td>
                        @if(isset($post->awardcategory->name))
                           {{$post->awardcategory->name}}
                        @endif
                    </td>
                    <td>
                        @if(isset($post->awardname->name))
                                {{$post->awardname->name}}
                            @endif

                    </td>

                    @can('update',$post)

                    <td><a href="/post/{{$post->id}}/edit" class="btn btn-primary">edit</a></td>

                    @endcan
                    @can('delete',$post)

                    <td>
                            {!! Form::open(['route'=>['post.destroy',$post->id],'method'=>'delete']) !!}

                            {!! Form::submit('delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure?')"]) !!}

                            {!! Form::close() !!}
                        </td>
                    @endcan


                </tr>
        @empty
        </table>
        <p>No Posts Found</p>
    </div>
        @endforelse
    </table>
    </div>

    <div class="pl-lg-5">
        {{ $posts->links() }}
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
                        url: '/changePostPublished',
                        data: {
                            'published': published,
                            'id': id
                        },
                        success: function (response) {
                            $('#success_message').html("");
                            $('#session').remove();
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.success);
                        }
                    })
                });
            });
        });
    </script>
@endpush

