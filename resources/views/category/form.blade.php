
<div class="form-group row">
    {!! Form::label('name','Name',['class'=>'col']) !!}

    <div class="col-12">
        {!! Form::text('name',old('name') ?? $category->name,[
                    'id'=>'categoryId',
                    'class'=>'form-control',
                    'oninput'=>'categorySlug()',
                    'autocomplete'=>'off']) !!}

    </div>

    @error('name')
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>


<div class="form-group row">
    {!! Form::label('slug','Slug',['class'=>'col']) !!}
    <div class="col-12">
        <p id="slugId" class="form-control">{{old('summary') ?? $category->slug}}</p>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('published','Published') !!}

{{--    {!! Form::hidden('published','0') !!}--}}

{{--    {!! Form::checkbox('published','1',true) !!}--}}

        <input type="hidden" id="published" name="published" value="0">

        <input type="checkbox" id="published"
               name="published"
               value="1"
               @if($category->published == 1)
               checked
            @endif
        >

</div>

@push('scripts')
    <script>


        function myFunction() {
            var x = document.getElementById("myInput")
                .value
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'');
            document.getElementById("demo").innerHTML = x;
        }

        function categorySlug() {
            var y = document.getElementById("categoryId")
                .value
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'');
            document.getElementById("slugId").innerHTML = y;
        }

        //
        // $(function() {
        //     $('.toggle-class').change(function() {
        //         var status = $(this).prop('checked') == true ? 1 : 0;
        //         var user_id = $(this).data('id');
        //
        //         $.ajax({
        //             type: "GET",
        //             dataType: "json",
        //             url: '/changeStatus',
        //             data: {'status': status, 'user_id': user_id},
        //             success: function(data){
        //                 console.log(data.success)
        //             }
        //         });
        //     })
        // })
    </script>

@endpush
