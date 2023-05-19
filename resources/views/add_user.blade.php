@extends('app')
@section('content')

<div class="col-lg-5 mx-auto">

    <h2 class="text-center text-success my-3">Laravel Create</h2>
        <div class="card p-3">
            <form id="my-form" action="{{ route('add') }}"
              enctype="multipart/form-data">
              @csrf
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text"
                class="form-control @error('name') is-invalid

                @enderror" name="name" id="name"  placeholder="Name">
            </div>

        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email"
              class="form-control @error('email') is-invalid

              @enderror" name="email" id="email"  placeholder="Email">
          </div>

      <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="text"
          class="form-control @error('password') is-invalid

          @enderror" name="password" id="password"  placeholder="Password">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file"
          class="form-control @error('file')
            is-invalid
          @enderror" name="file" id="image" >
      </div>
      <button id="btnSubmit" type="submit" class="btn btn-dark">Add</button>
    </form>
    <span id="output"></span>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>
    $(document).ready(function(){
        $("#my-form").submit(function(event){
            event.preventDefault();
            var  form = $('#my-form')[0];
            var data = new FormData(form);

            $('#btnSubmit').prop("disabled",true);
            $.ajax({
                type:"POST",
                url:"{{ route('add') }}",
                data:data,
                processData:false,
                contentType:false,
                success:function(data){
                    $('#output').text(data.res);
                    $('#btnSubmit').prop("disabled",false);
                    $("input[type='text']").val('');
                    $("input[type='email']").val('');
                    $("input[type='password']").val('');
                    $("input[type='file']").val('');

                },error:function(e){
                    $('#output').text(e.responseText);
                    // console.log(e.responseText)
                    $('#btnSubmit').prop("disabled",false);


                }
            });

        });


    });
</script>
@endsection
