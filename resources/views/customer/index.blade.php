@extends('layouts.navbar')

@section('content')

    {{-- Add Modal --}}
    <div class="modal fade" id="AddCustomerModal" tabindex="-1" aria-labelledby="AddCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">


                    <h5 class="modal-title" id="AddCustomerModalLabel">Add customer Data</h5>
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}

                </div>
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" required class="name form-control">
                        <span class="text-danger error-text name_error"></span>

                    </div>
                    <div class="form-group mb-3">
                        <label for="">Address</label>
                        <input type="text" required class="address form-control">
                        <span class="text-danger error-text address_error"></span>

                    </div>
{{--                    <div class="form-group mb-3">--}}
{{--                        <label for="">Email</label>--}}
{{--                        <input type="text" required class="email form-control">--}}
{{--                    </div>--}}
                    <div class="form-group mb-3">
                        <label for="">Phone No</label>
                        <input type="text" required class="phone form-control">
                        <span class="text-danger error-text phone_error"></span>

                    </div>

{{--                    <div class="form_group mb-3">--}}
{{--                        <label for="">Image</label>--}}
{{--                        <input type="file" class="image" id="image" name="image">--}}
{{--                        <span class="text-danger error-text image_error"></span>--}}


{{--                    </div>--}}


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_customer">Save</button>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update customer Data</h5>
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>

                <div class="modal-body">


                    <input type="hidden" id="id" />

                    <div class="form-group mb-3">
                        <label for="">Full Name</label>
                        <input type="text" id="name" required class="form-control">
                        <span class="text-danger error-text name_err"></span>

                    </div>
                    <div class="form-group mb-3">
                        <label for="">Address</label>
                        <input type="text" id="address" required class="form-control">
                        <span class="text-danger error-text address_err"></span>

                    </div>
{{--                    <div class="form-group mb-3">--}}
{{--                        <label for="">Email</label>--}}
{{--                        <input type="text" id="email" required class="form-control">--}}
{{--                    </div>--}}
                    <div class="form-group mb-3">
                        <label for="">Phone No</label>
                        <input type="text" id="phone" required class="form-control">
                        <span class="text-danger error-text phone_err"></span>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_customer">Update</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete customer Data</h5>
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_customer">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}

    <div class="pl-2" id="success_message"></div>

    <div class="container py-5">

        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <h4>
                            Customer Data

                            <div class="row pt-2 pl-3">

                                    @can('create', \App\Customer::class)
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#AddCustomerModal">Add customer</button>
                                @endcan

                                        <form class="form-inline ml-3">
                                            <div class="input-group input-group-sm">
                                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-navbar" type="submit">
                                                        <i class="fas fa-search"></i>
                                                    </button>
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
                                <th>Name</th>
                                <th>Address</th>
{{--                                <th>Email</th>--}}
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
            $(document).ready(function (){

                fetchCustomer();

                function fetchCustomer(){
                    $.ajax({
                        type:"GET",
                        url:"/customer/fetch",
                        dataType:"json",
                        success:function (response){
                            $('tbody').html("");
                            $.each(response.customers,function(key,customer){
                                $('tbody').append('<tr class="row1" data-id="'+customer.id+'">\
                                    <td><i class="fa fa-arrows" aria-hidden="true"></i> </td>\
                                    <td> '+customer.id+'</td>\
                                    <td> '+customer.name+' </td>\
                                    <td> '+customer.address+'</td>\
                                    <td> '+customer.phone+' </td>\
                                    <td><button type="button" value="' + customer.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                                    <td><button type="button" value="' + customer.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                                    </tr>');
                            });
                        }
                    });
                }

                // <td> <img src="/storage/'+customer.image+'" style="width: 50px;height: 50px"></td>\

                $(document).on('click','.add_customer',function(e){
                    e.preventDefault();

                    var data = {
                        'name': $('.name').val(),
                        'address': $('.address').val(),
                        'phone': $('.phone').val(),
                        // 'image':$('input[type="file"][name="image"]').name,
                    }
                    // $('input[type="file"][name="image"]').on('change', function() {
                    //     var img_path = $(this)[0].value;
                    //
                    // })

                        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type : "POST",
                        url : "/customer",
                        data : {
                            'name':data.name,
                            'address':data.address,
                            'phone':data.phone,
                            'image':data.image,
                        },
                        dataType : "json",
                        success: function(response){
                            if(response.status == 400)
                            {
                                $('.name_error').text("");
                                $('.address_error').text("");
                                $('.phone_error').text("");
                                $.each(response.errors.name,function (key,error) {
                                    $('.name_error').text(error);})
                                $.each(response.errors.address,function (key,error) {
                                    $('.address_error').text(error);})
                                $.each(response.errors.phone,function (key,error) {
                                    $('.phone_error').text(error);})
                            }
                            else{
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#AddCustomerModal').modal('hide');
                                $('#AddCustomerModal').find('input').val("");
                                fetchCustomer();
                            }
                        }
                    });
                });

                $(document).on('click', '.editbtn', function (e) {
                    e.preventDefault();
                    var id = $(this).val();

                    $('#editModal').modal('show');
                    $.ajax({
                        type: "GET",
                        url: "/customer/edit/" + id,
                        success: function (response) {
                            if (response.status == 404) {
                                $('#editModal').modal('hide');
                            } else {
                                $('#name').val(response.customer.name);
                                $('#address').val(response.customer.address);
                                // $('#email').val(response.customer.email);
                                $('#phone').val(response.customer.phone);
                                $('#id').val(id);
                            }
                        }
                    });
                    $('.btn-close').find('input').val('');
                });

                $(document).on('click', '.update_customer', function (e) {
                    e.preventDefault();

                    $(this).text('Updating..');
                    var id = $('#id').val();

                    var data = {
                        'name': $('#name').val(),
                        'address': $('#address').val(),
                        // 'email': $('#email').val(),
                        'phone': $('#phone').val(),
                        // 'image': $('#image').val(),
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "PUT",
                        url: "/customer/update/" + id,
                        data: data,
                        dataType: "json",
                        success: function (response) {

                            if (response.status == 400) {

                                $('.name_err').text("");
                                $('.address_err').text("");
                                $('.phone_err').text("");
                                $.each(response.errors.name,function (key,error) {
                                    $('.name_err').text(error);})
                                $.each(response.errors.address,function (key,error) {
                                    $('.address_err').text(error);})
                                $.each(response.errors.phone,function (key,error) {
                                    $('.phone_err').text(error);})

                                $('.update_customer').text('Update');
                            } else {

                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#editModal').find('input').val('');
                                $('.update_customer').text('Update');
                                $('#editModal').modal('hide');
                                fetchCustomer();
                            }
                        }
                    });

                });



                $(document).on('click', '.deletebtn', function () {
                    var id = $(this).val();
                    $('#DeleteModal').modal('show');
                    $('#deleteing_id').val(id);
                });

                $(document).on('click', '.delete_customer', function (e) {
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
                        url: "/customer/delete/" + id,
                        dataType: "json",
                        success: function (response) {
                            if (response.status == 404) {
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('.delete_customer').text('Delete');
                            } else {
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('.delete_customer').text('Delete');
                                $('#DeleteModal').modal('hide');
                                fetchCustomer();
                            }
                        }
                    });
                });



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
                        url:"/customer/sortable",
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
            // var loadFile = function(event) {
            //     var output = document.getElementById('output');
            //     output.src = URL.createObjectURL(event.target.files[0]);
            //     output.onload = function() {
            //         URL.revokeObjectURL(output.src) // free memory
            //     }
            // };
            // function removeImg(){
            //     output.src = "/storage/uploads/defaultPostImage.jpg";
            //     document.getElementById('image').value= null;
            // }

        </script>

    @endpush

@endsection


