@extends('layouts.navbar')

@section('content')



    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete opinion Data</h5>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-ary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_opinion">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="" id="result"></div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Dynamic Form
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route("opinion.insert") }}" id="dynamic_form">
                            @csrf
                        <table class="table">
                            <thead>
                            <tr>
{{--                                <th>Id</th>--}}
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                                </td>

                                <td></td>
                                <td>
                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Submit" />
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        </form>
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

            $(document).ready(function() {


                fetchopinion();

                function fetchopinion() {
                    $.ajax({
                        type: "GET",
                        url: "/opinion/fetch",
                        dataType: "json",
                        success: function (response) {
                            $('tbody').html("");
                            $('.buton').append('<a class="btn btn-success" id="newbtn" href="/opinion/create" >Add new Opinion</a>');

                            $.each(response.opinions, function (key, opinion) {
                                $('tbody').append('<tr class="row1" data-id="' + opinion.id + '">\
                                    <input type="hidden" name="id[]" class="form-control" value="' + opinion.id + '">\
                                    <td><input type="text" name="name[]" class="form-control" value="' + opinion.name + '"></td>\
                                    <td><input type="text" name="title[]" class="form-control" value="' + opinion.title + '"></td>\
                                    <td><input type="text" name="description[]" class="form-control" value="' + opinion.description + '"></td>\
                                    <td><button type="button" value="' + opinion.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                                    </tr>');
                            });
                        }
                    });
                }

                var count = 1;

                function dynamic_field(number) {
                    html = '<tr>';

                    html += '<input type="hidden" name="id[]" class="form-control" value="">';
                    html += '<td><input type="text" name="name[]" class="form-control"></td>';
                    html += '<span class="text-danger error-text name_error"></span>';

                    html += '<td><input type="text" name="title[]" class="form-control"></td>';
                    html += '<span class="text-danger error-text title_error"></span>';

                    html += '<td><input type="text" name="description[]" class="form-control" /></td>';
                    html += '<span class="text-danger error-text description_error"></span>';

                    if (number > 1) {
                        html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                        $('tbody').append(html);
                    } else {
                        html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                        $('tbody').html(html);
                    }
                }

                $(document).on('click', '#add', function () {
                    count++;
                    dynamic_field(count);
                });

                $(document).on('click', '.remove', function () {
                    count--;
                    $(this).closest("tr").remove();
                });

                $('#dynamic_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:'{{ route("opinion.insert") }}',
                        method:'post',
                        data:$(this).serialize(),
                        dataType:'json',
                        beforeSend:function(){
                            $('#save').attr('disabled','disabled');
                        },
                        success:function(data)
                        {
                            let a=0;
                            if(data.error)
                            {
                                console.log(data.error);
                                $('#result').html('<div class="alert alert-danger">'+data.error+'</div>');
                                // var error_html = '';
                                // for(var count = 0; count < data.error.length; count++)
                                // {
                                //     error_html += '<p>'+data.error[count]+'</p>';
                                // }
                                // $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                            }
                            else
                            {
                                dynamic_field(1);
                                $('#result').html('<div class="alert alert-success">'+data.message+'</div>');
                                fetchopinion();
                                                        }
                            $('#save').attr('disabled', false);
                        }
                    })
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
                        url: "/opinion/delete/" + id,
                        dataType: "json",
                        success: function (response) {
                            if (response.status == 0) {
                                $('#result').html('<div class="alert alert-success">' + response.message + '</div>');
                                $('.delete_opinion').text('Delete');
                            } else {
                                $('#result').html("");
                                $('#result').html('<div class="alert alert-success">' + response.message + '</div>');
                                $('.delete_opinion').text('Delete');
                                $('#DeleteModal').modal('hide');
                                $('#newbtn').remove();
                                fetchopinion();
                            }
                        }
                    });

                });
            })

        </script>

    @endpush

@endsection


