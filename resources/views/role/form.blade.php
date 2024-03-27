
<div class="form-group row">
    {!! Form::label('name','Name',['class'=>'col']) !!}
    <div class="col-12">
        {!! Form::text('name',old('name') ?? $role->name,['class'=>'form-control','autocomplete'=>'off']) !!}
    </div>
        @error('name')
        <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
        </div>
        @enderror
</div>


<div class="form-group row">

    {!! Form::label('permission','permission',['class'=>'col']) !!}

    <div class="col-12">
        @foreach($permissions as $permission)
            <label>{{ Form::checkbox('permission[]', $permission->id,(isset($selectedpermission) ? in_array($permission->id,$selectedpermission) ? true : false : null )) }}
                {{ $permission->name}}</label>
            <br/>
        @endforeach
{{--        @foreach($permissions as $permission)--}}
{{--            <label>--}}
{{--                <input type="checkbox" value="{{$permission->id}}" name="permission[]"--}}
{{--                       @isset($selectedpermission)--}}
{{--                @if(in_array($permission->id,$selectedpermission))--}}
{{--                    checked--}}
{{--                    @endif--}}
{{--                    @endisset--}}
{{--                >--}}
{{--                {{ $permission->name}}</label>--}}
{{--            <br/>--}}

{{--        @endforeach--}}
    </div>

    @error('permission')
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>





{{--@push('scripts')--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

{{--    <script>--}}

{{--        $('.permission').select2({--}}
{{--            placeholder: "Select a permission",--}}
{{--            allowClear: true--}}
{{--        });--}}

{{--    </script>--}}

{{--@endpush--}}

