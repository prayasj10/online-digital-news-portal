@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create a new post</div>
            <div class="card-body">

                {!! Form::open(['route'=>'post.store','method'=>'post','id'=>'postform','files' => true]) !!}

                @include('post.form')


                <div class="form-group row">



                    {!! Form::label('image','Image',['class'=>'col']) !!}
                    <div class="col-12">

                        {{--        <input type="file" accept="image/*" onchange="loadFile(event)">--}}
                        {{--        {!! Form::file('image',['accept'=>'image/*' ,'onchange'=>'loadFile(event)','id'=>'image']) !!}--}}
                        <input type="file" name="image" id="image">

                        @error('image')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex">
                    <div class="img-holder"></div>
                    <div class="img-close" onclick="removeImg()" style="cursor:pointer;"></div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        function removeImg() {
            $('.img-holder').html("");
            $('.img-close').html("");
            document.getElementById('image').value = null;
        }

        $(document).ready(function () {

            $('input[type="file"][name="image"]').val('');
            $('input[type="file"][name="image"]').on('change', function () {
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var img_close = $('.img-close');
                var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

                if (extension == 'jpeg' || extension == 'jpg' || extension == 'png') {
                    if (typeof (FileReader) != 'undefined') {
                        img_holder.empty();
                        img_close.empty();
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<img/>', {
                                'src': e.target.result,
                                'class': 'img-fluid',
                                'style': 'max-width:100px;margin-bottom:10px;'
                            }).appendTo(img_holder);
                            $('.img-close').append('<i class="fa fa-times" aria-hidden="true"></i>');
                        }
                        img_holder.show();
                        img_close.show();

                        reader.readAsDataURL($(this)[0].files[0]);
                    } else {
                        $(img_holder).html('This browser does not support FileReader');
                    }
                } else {
                    $(img_holder).empty();
                    $(img_close).empty();

                }
            });
        })



    </script>
@endpush

