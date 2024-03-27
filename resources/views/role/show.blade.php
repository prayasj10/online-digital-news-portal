@extends('layouts.navbar')

@section('content')
    <div class="card">

        <div class="card-header">
        <h1>
            User
        </h1>
        </div>


        <div class="card-body">
            <p>
                @foreach($role->permissions as $permission)
                        {{$permission->name}}
                    <br>
                @endforeach
            </p>
        </div>
    </div>

{{--    <div class="pt-5 pl-1" >--}}
{{--        Category:--}}
{{--        {!! $role->category !!}--}}

{{--    </div>--}}

{{--    <div class="pt-3 pl-1">--}}
{{--        Author:--}}
{{--        {{$role->author}}--}}
{{--        {{$role->categories->slug}}--}}
{{--    </div>--}}

{{--    <div class="pt-3 pl-2">--}}
{{--        @if($role->published == 1)--}}
{{--            <a href="#" class="btn btn-outline-success">Published</a>--}}
{{--        @else--}}
{{--            <a href="#" class="btn btn-outline-danger">Unpublished</a>--}}
{{--        @endif--}}
{{--    </div>--}}

@endsection
