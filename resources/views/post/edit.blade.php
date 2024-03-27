@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">Edit post</div>

            <div class="card-body">

                {!! Form::open(['route'=>['post.update', $post->id] ,'method'=>'patch','files' => true]) !!}


                @include('post.form')

                <div class="form-group">
                    <label for="" >Image <button type="button" id="clearInputFile" class="btn btn-danger" data-id="{{$post->id}}">Clear</button></label>
                    <div>
                        <input type="file" name="image" data-value="" id="image"></div>
{{--                    <span class="text-danger error-text image_update_error"></span>--}}
                </div>

                <div class="d-flex">
                    <div class="img-holder-update">
                        @if($post->image != null)
                            <img src="{{$post->image}}" class="img-fluid" style="width:100px;height:60px;margin-bottom:10px;">

{{--                            <div class="deleteImage"><i class="fa fa-times" aria-hidden="true"></i></div>--}}
                        @else
                            <img src="/frontend/posts/defaultPostImage.jpg" class="img-fluid" style="width:100px;height:60px;margin-bottom:10px;">
                        @endif
                    </div>
                    <div class="img-close" onclick="removeImg()"></div>
                </div>

                <div class="form-group row mb-0"><div class="col-md-6 offset-md-4">
                        {!! Form::submit('Edit',['class'=>'btn btn-primary']) !!}</div></div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection

@push('scripts')

    <script>

            $(document).on('click', '.deleteImage', function () {
                var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/deleteImage',
                data: {
                    'id': id
                },
                success: function (data) {
                    console.log(data.success)
                }
            })
        });
        function removeImg() {
            $('.img-holder').html("");
            $('.img-close').html("");
            document.getElementById('image').value = null;
        }



        $('input[type="file"][name="image"]').on('change', function () {
            var img_path = $(this)[0].value;
            var img_holder = $('.img-holder-update');
            // var img_close = $('.img-close');
            var currentImagePath = $(this).data('value');
            var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

            if (extension == 'jpeg' || extension == 'jpg' || extension == 'png') {
                if (typeof (FileReader) != 'undefined') {
                    img_holder.empty();
                    // img_close.empty();
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('<img/>', {
                            'src': e.target.result,
                            'class': 'img-fluid',
                            'style': 'max-width:100px;margin-bottom:10px;'
                        }).appendTo(img_holder);
                        // $('.img-close').append('<i class="fa fa-times" aria-hidden="true"></i>');
                    }
                    img_holder.show();
                    // img_close.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    $(img_holder).html('This browser does not support FileReader');
                }
            } else {
                $(img_holder).html(currentImagePath);
                // $(img_close).empty();
            }
        });
            $(document).on('click', '#clearInputFile', function () {
                var form = $(this).closest('form');
                var id = $(this).data('id');

                // if(confirm ('Are you sure?')) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: '/deleteImage',
                        data: {
                            'id': id
                        },
                        success: function (data) {
                            console.log(data.message)
                            $(form).find('input[type="file"]').val('');
                            $(form).find('.img-holder-update').html('');
                            $(form).find('.img-holder-update').append('<img src="/frontend/posts/defaultPostImage.jpg" class="img-fluid" style="width:100px;height:60px;margin-bottom:10px;">');
                        }
                    })

                // }

            });
    </script>
@endpush
