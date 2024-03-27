
<div class="form-group row">
    {!! Form::label('name','Name',['class'=>'col']) !!}
    <div class="col-12">
        {!! Form::text('name',old('name') ?? $author->name,['class'=>'form-control','autocomplete'=>'off']) !!}
    </div>

    @error('name')
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>


<div class="form-group row">
    {!! Form::label('facebook','Facebook',['class'=>'col']) !!}
    <div class="col-12">
        {!! Form::text('facebook',old('facebook') ?? $author->facebook,['class'=>'form-control','autocomplete'=>'off']) !!}
    </div>

    @error('facebook')
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>


<div class="form-group row">
    {!! Form::label('twitter','Twitter',['class'=>'col']) !!}
    <div class="col-12">
        {!! Form::text('twitter',old('twitter') ?? $author->twitter,['class'=>'form-control','autocomplete'=>'off']) !!}
    </div>

    @error('twitter')
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>

{{--<div class="form-group row">--}}

{{--    {!! Form::label('country','Country',['class'=>'col']) !!}--}}

{{--    <div class="col-12">--}}

{{--        {!! Form::select('country', ['' => 'Select a country'] + $countries->all(), $author->country->id ?? null,['class' => 'form-control'], ['' => ['disabled']]) !!}--}}


{{--        @error('country')--}}
{{--        <div class="alert alert-danger">--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </div>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}

{{--    {!! Form::label('city','City',['class'=>'col']) !!}--}}

{{--    <div class="col-12">--}}

{{--        <select name="city" class="form-control" id="city">--}}
{{--            <option value="" disabled selected>Select a city</option>--}}
{{--        </select>--}}

{{--        @error('city')--}}
{{--        <div class="alert alert-danger">--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </div>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}

<div class="form-group row">
    {!! Form::label('published','Published') !!}

{{--    {!! Form::hidden('published','0') !!}--}}

{{--    {!! Form::checkbox('published','1',true) !!}--}}

        <input type="hidden" id="published" name="published" value="0">

        <input type="checkbox" id="published"
               name="published"
               value="1"
               @if($author->published == 1)
               checked
            @endif
        >

</div>

{{--@push('scripts')--}}

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#country').on('change', function() {--}}
{{--                var id = $(this).val();--}}
{{--                if(id) {--}}

{{--                    $.ajaxSetup({--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                        }--}}
{{--                    });--}}

{{--                    $.ajax({--}}
{{--                        url: '/city/'+id,--}}
{{--                        type: "GET",--}}
{{--                        dataType: "json",--}}
{{--                        success:function(data) {--}}
{{--                            if(data){--}}
{{--                                $('#city').empty();--}}
{{--                                $('#city').focus;--}}
{{--                                $('#city').append('<option value="" disabled selected>Select a city</option>');--}}
{{--                                $.each(data, function(key, value){--}}
{{--                                    $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');--}}
{{--                                });--}}
{{--                            }else{--}}
{{--                                $('#city').empty();--}}
{{--                            }--}}
{{--                        }--}}
{{--                    });--}}
{{--                }else{--}}
{{--                    $('#city').remove();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
