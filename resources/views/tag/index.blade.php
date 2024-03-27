@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row pl-3">
            <h1>Tags</h1>
        </div>

        <div class="row pl-3">
            <a href="/tag/create" >Add new tag</a>
        </div>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th></th>
            </tr>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>

                    <td>{{$tag->name}}</td>

                        <td><a href="/tag/{{$tag->id}}/edit" class="btn btn-primary">edit</a></td>

                        <td>
                            {!! Form::open(['route'=>['tag.destroy',$tag->id],'method'=>'delete']) !!}

                            {!! Form::submit('delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure?')"]) !!}

                            {!! Form::close() !!}
                        </td>


                </tr>
            @endforeach

        </table>
    </div>


@endsection



