
<div class="form-group row">
    {!! Form::label('name','Name',['class'=>'col']) !!}
    <div class="col-12">
        {!! Form::text('name',old('name'),['class'=>'form-control','autocomplete'=>'off']) !!}
    </div>
{{--    ?? $advertisement->name--}}
        @error('name')
        <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
        </div>
        @enderror
</div>


<div class="form-group row">



    {!! Form::label('image','Image',['class'=>'col']) !!}
    <div class="col-12">

{{--        <input type="file" accept="image/*" onchange="loadFile(event)">--}}
        {!! Form::file('image',['accept'=>'image/*' ,'onchange'=>'loadFile(event)','id'=>'image']) !!}


        @error('image')
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div>



<div class="form-group row">

    {!! Form::label('page1','Home Page',['class'=>'col']) !!}
    <div class="col-12">


        <input type="radio" name="page1" value="1">
{{--        <input type="radio" name="published" value="1" @if($post->published == 1) checked @endif>--}}
        {!! Form::label('page1','Add Ad') !!}

    </div>
</div>

<div class="form-group row">

    {!! Form::label('page2','Listing Page',['class'=>'col']) !!}
    <div class="col-12">

        <input type="radio" name="page2" value="1">

        {!! Form::label('page2','Add ad') !!}

    </div>
</div>

<div class="form-group row">

    {!! Form::label('page3','Detail Page',['class'=>'col']) !!}
    <div class="col-12">

        <input type="radio" name="page3" value="1">

        {!! Form::label('page3','Add ad') !!}

    </div>
</div>

{{--    <div class="d-flex">--}}
{{--<div class="myDIV">--}}
{{--            <img id="output"--}}
{{--                 @if(isset($post->image))--}}
{{--                 src="/storage/{{$post->image}}"--}}
{{--                 @else--}}
{{--                 src="/storage/uploads/defaultPostImage.jpg"--}}
{{--                 @endif--}}
{{--                 style="height: 100px;width:150px">--}}
{{--</div>--}}
{{--        <div class="cancel-btn" style="cursor: pointer" onclick="removeImg()">--}}
{{--            @if(isset($post->image))--}}
{{--            <a href="/deleteImage/{{$post->id}}">--}}
{{--                @endif--}}
{{--                <i class="fas fa-times"></i>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@push('scripts')--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            // $('.ckeditor').ckeditor();--}}


{{--            $('.category').select2({--}}
{{--                placeholder: "Select a category",--}}
{{--                allowClear: true--}}
{{--            });--}}

{{--            $('.tag').select2({--}}
{{--                placeholder: "Select a tag",--}}
{{--                tags: true,--}}
{{--                tokenSeparators: [',', ' '],--}}
{{--                allowClear: true--}}
{{--            });--}}

{{--            $('#awardcategory').on('change', function () {--}}
{{--                var id = $(this).val();--}}
{{--                if (id) {--}}

{{--                    $.ajaxSetup({--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                        }--}}
{{--                    });--}}

{{--                    $.ajax({--}}
{{--                        url: '/awardcategory/' + id,--}}
{{--                        type: "GET",--}}
{{--                        dataType: "json",--}}
{{--                        success: function (data) {--}}
{{--                            if (data) {--}}
{{--                                $('#award_row').empty();--}}
{{--                                $('#award').empty();--}}

{{--                                $('#awardname').empty();--}}
{{--                                $('#awardname').focus;--}}
{{--                                $('#award_row').append('<label for="awardname" class="col" id="award">Award Name</label>');--}}
{{--                                $('#award').append('<select name="awardname" class="form-control" id="awardname">');--}}
{{--                                $('#awardname').append('<option value="" disabled selected>Select an award name</option>');--}}
{{--                                $.each(data, function (key, value) {--}}
{{--                                    $('select[name="awardname"]').append('<option value="' + key + '">' + value + '</option>');--}}
{{--                                });--}}
{{--                            } else {--}}
{{--                                $('#award_row').empty();--}}
{{--                                $('#award').empty();--}}
{{--                                $('#awardname').empty();--}}
{{--                            }--}}
{{--                        }--}}
{{--                    });--}}
{{--                } else {--}}
{{--                    $('#award_row').empty();--}}
{{--                    $('#award').empty();--}}
{{--                    $('#awardname').empty();--}}
{{--                }--}}
{{--            });--}}


{{--            var loadFile = function (event) {--}}
{{--                var output = document.getElementById('output');--}}
{{--                output.src = URL.createObjectURL(event.target.files[0]);--}}
{{--                output.onload = function () {--}}
{{--                    URL.revokeObjectURL(output.src) // free memory--}}
{{--                }--}}
{{--            };--}}

{{--            function removeImg() {--}}
{{--                output.src = "/storage/uploads/defaultPostImage.jpg";--}}
{{--                document.getElementById('image').value = null;--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}

{{--@endpush--}}

