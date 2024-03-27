
<div class="form-group row">
    {!! Form::label('name','Name',['class'=>'col']) !!}
    <div class="col-12">
        {!! Form::text('name',old('name') ?? $tag->name,['class'=>'form-control','autocomplete'=>'off']) !!}
    </div>
        @error('name')
        <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
        </div>
        @enderror
</div>
