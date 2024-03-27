@extends('layouts.navbar')

@section('content')

    {{--Edit Modal --}}

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update opinion Data</h5>
                    {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>

                <div class="modal-body">


                    <input type="hidden" id="id" />

                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" id="name" required class="form-control">
                        <span class="text-danger error-text name_err"></span>

                    </div>
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" id="title" required class="form-control">
                        <span class="text-danger error-text title_err"></span>

                    </div>

                    <div class="form-group mb-3">
                        <label for="">Description</label>
                        <input type="text" id="description" required class="form-control">
                        <span class="text-danger error-text description_err"></span>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_opinion">Update</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete opinion Data</h5>
                    {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_opinion">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}


    <div class="container">
        <br />
        <h3 align="center">Dynamic Form</h3>
        <br />
        <div class="row pl-3 pb-3">
            <a class="btn btn-success" href="/secondopinion/create" >Add new Opinion</a>
        </div>
        <div class="table-responsive">
            <form method="post" id="dynamic_form">
                <span id="result"></span>
                <table class="table table-bordered table-striped" id="user_table">
                    <thead>
                    <tr>
                        <th width="35%">Name</th>
                        <th width="35%">Title</th>
                        <th width="30%">Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </form>
        </div>
    </div>


    @push('scripts')


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <script>
            $(document).ready(function () {

                fetchopinion();

                function fetchopinion() {


                    $.ajax({
                        type: "GET",
                        url: "/secondopinion/fetch",
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        success: function (response) {
                            $('tbody').html("");
                            $.each(response.opinions, function (key, opinion) {
                                $('tbody').append('<tr class="row1" data-id="' + opinion.id + '">\
                                    <td> ' + opinion.name + ' </td>\
                                    <td> ' + opinion.title + '</td>\
                                    <td> ' + opinion.description + ' </td>\
                                    <td><button type="button" value="' + opinion.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                                    <td><button type="button" value="' + opinion.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                                    </tr>');
                            });
                        }
                    });
                }

                $(document).on('click', '.editbtn', function (e) {
                    e.preventDefault();
                    var id = $(this).val();

                    $('#editModal').modal('show');
                    $.ajax({
                        type: "GET",
                        url: "/secondopinion/edit/" + id,
                        success: function (response) {
                            if (response.status == 404) {
                                $('#editModal').modal('hide');
                            } else {
                                $('#name').val(response.secondopinion.name);
                                $('#title').val(response.secondopinion.title);
                                $('#description').val(response.secondopinion.description);
                                $('#id').val(id);
                            }
                        }
                    });
                    $('.btn-close').find('input').val('');
                });

                $(document).on('click', '.update_opinion', function (e) {
                    e.preventDefault();

                    $(this).text('Updating..');
                    var id = $('#id').val();

                    var data = {
                        'name': $('#name').val(),
                        'title': $('#title').val(),
                        // 'email': $('#email').val(),
                        'description': $('#description').val(),
                        // 'image': $('#image').val(),
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "PUT",
                        url: "/secondopinion/update/" + id,
                        data: data,
                        dataType: "json",
                        success: function (response) {

                            if (response.status == 400) {

                                $('.name_err').text("");
                                $('.title_err').text("");
                                $('.description_err').text("");
                                $.each(response.errors.name,function (key,error) {
                                    $('.name_err').text(error);})
                                $.each(response.errors.title,function (key,error) {
                                    $('.title_err').text(error);})
                                $.each(response.errors.description,function (key,error) {
                                    $('.description_err').text(error);})

                                $('.update_opinion').text('Update');
                            } else {

                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#editModal').find('input').val('');
                                $('.update_opinion').text('Update');
                                $('#editModal').modal('hide');
                                fetchopinion();
                            }
                        }
                    });

                });


                $(document).on('click', '.deletebtn', function () {
                    var id = $(this).val();
                    $('#DeleteModal').modal('show');
                    $('#deleteing_id').val(id);
                });

                $(document).on('click', '.delete_opinion', function (e) {
                    e.preventDefault();

                    $(this).text('Deleting..');
                    var id = $('#deleteing_id').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: "/secondopinion/delete/" + id,
                        dataType: "json",
                        success: function (response) {
                            if (response.status == 404) {
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('.delete_opinion').text('Delete');
                            } else {
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('.delete_opinion').text('Delete');
                                $('#DeleteModal').modal('hide');
                                fetchopinion();
                            }
                        }
                    });
                });

            });
        </script>

    @endpush

@endsection


