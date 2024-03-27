
<div class="form-group row">
    {!! Form::label('title','Title',['class'=>'col']) !!}
    <div class="col-12">
        {!! Form::text('title',old('title') ?? $post->title,['class'=>'form-control','autocomplete'=>'off']) !!}
    </div>
        @error('title')
        <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
        </div>
        @enderror
</div>

<div class="form-group row">
    {!! Form::label('content','Content',['class'=>'col']) !!}


    <div class="col-12">
        {!! Form::textarea('content',old('content') ?? $post->content,['class'=>'ckeditor form-control']) !!}
    </div>

    @error('content')
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>

<div class="form-group row">

    {!! Form::label('category','Category',['class'=>'col']) !!}

    <div class="col-12">


        {!! Form::select('category[]', $categories, $selectedCategory ?? null, ['class'=>'category form-control','multiple'=>true]) !!}

{{--                    {!! Form::select('category[]', ['' => 'Select your category'] + $categories->all(), $selectedCategory ?? null,--}}
{{--            ['class' => 'category','multiple'=>true,'id'=>'category'], ['' => ['disabled']]) !!}--}}
    </div>

    @error('category')
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>

<div class="form-group row">

    {!! Form::label('tag','Tag',['class'=>'col']) !!}

    <div class="col-12">


        {!! Form::select('tag[]', $tags, $selectedTag ?? null,['class' => 'tag  form-control','multiple'=>true]) !!}
{{--        {!! Form::text('additionaltag',old('additionaltag') ?? null,['placeholder'=>'Add a tag (Tags are separated by a space)','class'=>'form-control','autocomplete'=>'off']) !!}--}}

    </div>

    @error('tag')
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>


<div class="form-group row">

    {!! Form::label('author','Author',['class'=>'col']) !!}

    <div class="col-12">

{{--        {!! Form::select('author', $authors, $post->author->id ?? null, ['placeholder' => 'Select an author','class'=>'form-control']) !!}--}}
        {!! Form::select('author', ['' => 'Select an author'] + $authors->all(), $post->author->id ?? null,['class' => 'form-control'], ['' => ['disabled']]) !!}
    </div>

    @error('author')
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>

<div class="form-group row">

    {!! Form::label('awardcategory','Award Category',['class'=>'col']) !!}

    <div class="col-12">

        {!! Form::select('awardcategory', ['' => 'Select a award category'] + $awardcategories->all(), $post->awardcategory->id ?? null,['class' => 'form-control'], ['' => ['disabled']]) !!}


        @error('awardcategory')
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div>

<div class="form-group row" id="award_row">

{{--    {!! Form::label('awardname','Award Name',['class'=>'col','id'=>'award']) !!}--}}

    <div class="col-12">

{{--        <select name="awardname" class="form-control" id="awardname">--}}
{{--            <option value="" disabled selected>Select an award name</option>--}}
{{--        </select>--}}

        @error('awardname')
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">

    {!! Form::label('published','Published',['class'=>'col']) !!}
    <div class="col-12">

        {!! Form::label('published','Yes') !!}

{{--        <input type="radio" name="published" value="1" @if($post->published == 1) checked @endif>--}}
        {!! Form::radio('published', '1', isset($post->published)?$post->published=='1'?'true' :false:'true') !!}

        {!! Form::label('published','No') !!}

        {!! Form::radio('published','0',isset($post->published)?$post->published=='0'?'true' :false:null) !!}

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


@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // function removeImg(){
        //     $('.img-holder').html("");
        //     $('.img-close').html("");
        //     document.getElementById('image').value= null;
        // }

        $(document).ready(function () {
            // $('.ckeditor').ckeditor();



            $('.category').select2({
                placeholder: "Select a category",
                allowClear: true
            });

            $('.tag').select2({
                placeholder: "Select a tag",
                tags: true,
                tokenSeparators: [',', ' '],
                allowClear: true
            });

            $('#awardcategory').on('change', function () {
                var id = $(this).val();
                if (id) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '/awardcategory/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                $('#award_row').empty();
                                $('#award').empty();

                                $('#awardname').empty();
                                $('#awardname').focus;
                                $('#award_row').append('<label for="awardname" class="col" id="award">Award Name</label>');
                                $('#award').append('<select name="awardname" class="form-control" id="awardname">');
                                $('#awardname').append('<option value="" disabled selected>Select an award name</option>');
                                $.each(data, function (key, value) {
                                    $('select[name="awardname"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            } else {
                                $('#award_row').empty();
                                $('#award').empty();
                                $('#awardname').empty();
                            }
                        }
                    });
                } else {
                    $('#award_row').empty();
                    $('#award').empty();
                    $('#awardname').empty();
                }
            });


            // var loadFile = function (event) {
            //     var output = document.getElementById('output');
            //     output.src = URL.createObjectURL(event.target.files[0]);
            //     output.onload = function () {
            //         URL.revokeObjectURL(output.src) // free memory
            //     }
            // };

            // function removeImg() {
            //     output.src = "/storage/uploads/defaultPostImage.jpg";
            //     document.getElementById('image').value = null;
            // }
        })
    </script>

@endpush

