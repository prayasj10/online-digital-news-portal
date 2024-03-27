@extends('layouts.navbar')

@section('content')

    <div class="" id="success_message"></div>


    {{-- Add Modal --}}
    <div class="modal fade" id="AddImageModal" tabindex="-1" aria-labelledby="AddImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="AddImageModalLabel">Add image Data</h5>

                </div>
                <div class="modal-body">

                    <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                            <span class="text-danger error-text name_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter address">
                            <span class="text-danger error-text address_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter phone number">
                            <span class="text-danger error-text phone_error"></span>
                        </div>


                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" id="image">
                            <span class="text-danger error-text image_error"></span>
                        </div>

                        <div class="d-flex">
                            <div class="img-holder"></div>
                            <div class="img-close" onclick="removeImg()" style="cursor:pointer;"></div>
                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Save Image</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    {{-- Edn- Add Modal --}}

    {{-- Edit Modal --}}

    <div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editImageModalLabel">Edit & Update image Data</h5>
                    {{--                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>

                <div class="modal-body">
                    <form action="{{route('image.update')}}" method="post" enctype="multipart/form-data" id="update_form">
                        @csrf
                        <input type="hidden" name="id">

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter address">
                            <span class="text-danger error-text address_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter phone number">
                            <span class="text-danger error-text phone_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="" >Image <button type="button" id="clearInputFile" class="btn btn-danger">Clear</button></label>
                            <div>
                                <input type="file" name="image_update" data-value="" id="image"></div>
                            <span class="text-danger error-text image_update_error"></span>
                        </div>

                        <div class="d-flex">
                            <div class="img-holder-update"></div>
                            <div class="img-close" onclick="removeImg()"></div>
                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- Edn- Edit Modal --}}


    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete image Data</h5>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_image">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Image Data
                            <div class="row pt-2 pl-3">
                                <button type="button" class="btn btn-success" id="addimgg" data-bs-toggle="modal"
                                        data-bs-target="#AddImageModal">Add image</button>

                                <form class="form-inline ml-3">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-navbar" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            @if (isset($_GET['search']))
                                                <a class="clear-search" href="/post" title="Clear Filter">Clear Filter</a>
                                            @endif
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody id="sortable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >--}}
        {{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}

        {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <script>
            function removeImg(){
                // output.src = "/storage/uploads/defaultPostImage.jpg";
                // document.getElementById('image').value= null;
                $('.img-holder').html("");
                $('.img-close').html("");
                document.getElementById('image').value= null;
            }

            $(document).ready(function () {

                fetchImage();

                function fetchImage() {
                    $.ajax({
                        type: "GET",
                        url: "/image/fetch",
                        dataType: "json",
                        success: function (response) {
                            $('tbody').html("");
                            $.each(response.images, function (key, image) {
                                var img = image.image;
                                if (img == null) {
                                    img = 'defaultimage.png';
                                }
                                $('tbody').append('<tr class="row1" data-id="' + image.id + '">\
                                    <td><i class="fa fa-arrows" aria-hidden="true"></i> </td>\
                                    <td> ' + image.id + '</td>\
                                    <td> <img src="/cms/images/' + img + '" style="width: 50px;height: 50px"></td>\
                                    <td> ' + image.name + ' </td>\
                                    <td> ' + image.address + ' </td>\
                                    <td> ' + image.phone + ' </td>\
                                    <td><button type="button" data-id="' + image.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                                    <td><button type="button" data-id="' + image.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                                    </tr>');
                            });
                        }
                    });
                }


                $(document).on('click', '#addimgg', function (e) {
                    e.preventDefault();
                    $('#AddImageModal').find('input').val("");
                    $('.img-holder').html('');
                    $('.img-close').html('');

                    // $(form).find('input[type="file"]').val('');


                });


                $('#form').on('submit', function (e) {
                    e.preventDefault();

                    var form = this;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: new FormData(form),
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        beforeSend: function () {
                            $(form).find('span.error-text').text('');
                        },
                        success: function (data) {
                            if (data.code == 0) {
                                $.each(data.error, function (prefix, val) {
                                    $(form).find('span.' + prefix + '_error').text(val[0]);
                                });
                            } else {
                                $(form)[0].reset();
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(data.message);
                                $('#AddImageModal').modal('hide');
                                $('#AddImageModal').find('input').val("");
                                $('.img-holder').html("");
                                $('.img-close').html("");
                                fetchImage();
                            }
                        }
                    });
                });

                //Reset input file
                $('input[type="file"][name="image"]').val('');
                //Image preview
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


                // edit
                $(document).on('click', '.editbtn', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    url = '{{route("image.details")}}';
                    $.get(url, {id: id}, function (data) {
                        $('#editImageModal').find('form').find('input[name="id"]').val(data.result.id);
                        $('#editImageModal').find('form').find('input[name="name"]').val(data.result.name);
                        $('#editImageModal').find('form').find('input[name="address"]').val(data.result.address);
                        $('#editImageModal').find('form').find('input[name="phone"]').val(data.result.phone);
                        var img = data.result.image;
                        if (img == null) {
                            img = 'defaultimage.png';
                        }
                        $('#editImageModal').find('form').find('.img-holder-update').html('<img src="/cms/images/' + img + '" class="img-fluid" style="max-width:100px;margin-bottom:10px;">');
                        $('#editImageModal').find('form').find('input[type="file"]').attr('data-value', '<img src="/cms/images/' + img + '" class="img-fluid" style="max-width:100px;margin-bottom:10px;">');
                        $('#editImageModal').find('form').find('input[type="file"]').val('');
                        $('#editImageModal').find('form').find('span.error-text').text('');
                        $('#editImageModal').modal('show');

                    }, 'json');
                });


                $('input[type="file"][name="image_update"]').on('change', function () {
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
                    var id = $(form).find('input[name="id"]').val();





                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: '/deleteImg',
                        data: {
                            'id': id
                        },
                        success: function (data) {
                            console.log(data.image)
                            $(form).find('input[type="file"]').val('');
                            $(form).find('.img-holder-update').html('');
                        }
                    })
                    // $(form).find('.img-holder-update').html($(form).find('input[type="file"]').data('value'));
                });

                $('#update_form').on('submit', function (e) {
                    e.preventDefault();

                    var form = this;
                    $.ajax({
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: new FormData(form),
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        beforeSend: function () {
                            $(form).find('span.error-text').text('');
                        },
                        success: function (data) {
                            if (data.code == 0) {
                                $.each(data.error, function (prefix, val) {
                                    $(form).find('span.' + prefix + '_error').text(val[0]);
                                });
                            } else {
                                // $(form)[0].reset();
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(data.message);
                                fetchImage();

                                $('#editImageModal').modal('hide');
                                // $('#AddImageModal').find('input').val("");
                                // $('.img-holder').html("");
                                // $('.img-close').html("");
                            }
                        }
                    });
                });

                $(document).on('click','.deletebtn',function () {
                    var id = $(this).data('id');
                    url = '{{route("image.delete")}}';

                    if (confirm('Are you sure you want to delete')) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: url,
                            method: 'POST',
                            data: {id: id},
                            dataType: 'json',
                            success: function (data) {
                                if (data.code == 1) {
                                    $('#success_message').html("");
                                    $('#success_message').addClass('alert alert-success');
                                    $('#success_message').text(data.message);
                                    fetchImage();
                                } else {

                                    $('#success_message').html("");
                                    $('#success_message').addClass('alert alert-success');
                                    $('#success_message').text(data.message);
                                }
                            }
                        })
                    }
                })

                $( function() {
                    $( "#sortable" ).sortable({
                        items: "tr",
                        cursor: 'move',
                        opacity: 0.6,
                        update: function (){
                            saveNewPositions();
                        }
                    });
                } );

                function saveNewPositions(){
                    var position = [];
                    $('tr.row1').each(function(index,element) {
                        position.push({
                            id: $(this).attr('data-id'),
                            position: index + 1,
                        });
                    });

                    $.ajax({
                        url:"/image/sortable",
                        type: "POST",
                        dataType: "json",
                        data: {
                            position:position,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (response){

                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                        }
                    });
                }

            });



        </script>

    @endpush

@endsection


