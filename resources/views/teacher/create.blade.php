@extends('app')
@section('content')
<div class="col-lg-5 mx-auto">

    <h2 class="text-center text-success my-3">Create</h2>
        <div class="card p-3">
            {{-- <form id="my-form" action="{{ route('teacher.store') }}" method="POST"> --}}
              {{-- @csrf --}}
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text"
                class="form-control @error('name') is-invalid @enderror" name="name" id="name"  placeholder="Name">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                 @enderror
                 <span class="text-danger nameError"></span>
            </div>

        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="title"
              class="form-control @error('title') is-invalid
              @enderror" name="title" id="title"  placeholder="title">
              @error('title')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
              <span class="text-danger titleError"></span>
          </div>

      <div class="mb-3">
        <label for="" class="form-label">Institute</label>
        <input type="text"
          class="form-control @error('institute') is-invalid
          @enderror" name="institute" id="institute"  placeholder="Institute">
          @error('institute')
          <span class="text-danger">{{ $message }}</span>
      @enderror
      <span class="text-danger instituteError"></span>
      </div>

      <button id="btnButton" onClick="addTeacher()"  class="btn btn-dark">Create</button>
    {{-- </form> --}}
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


    function addTeacher(){
      var name=  $('#name').val();
       var title = $('#title').val();
       var institute = $('#institute').val();
        //  console.log(name+title+institute);

        $.ajax({
            type:"POST",
            dataType:"json",
            data:{name:name,title:title,institute:institute},
            url:"{{ route('teacher.store') }}",
            success:function(data){
                console.log('Successfully create');
                $('#name').val('');
                $('#title').val('');
                $('#institute').val('');
                $('.nameError').text('');
                $('.titleError').text('');
                $('.instituteError').text('');
            },error:function(error){
                $('.nameError').text(error.responseJSON.errors.name);
                $('.titleError').text(error.responseJSON.errors.title);
                $('.instituteError').text(error.responseJSON.errors.institute);
            }
        });
    }

</script>
@endsection
