@extends('app')
@section('content')
{{--
 <div class="col-lg-5 mx-auto">

    <h2 class="text-center text-success my-3">Create</h2>
        <div class="card p-3">

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

    <span id="output"></span>
  </div>
</div> --}}


 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
  data-bs-whatever="@getbootstrap">Teacher</button>

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Add</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form>
           <div class="mb-3">
             <label for="recipient-name" class="col-form-label">Name</label>
             <input type="text" name="name" class="form-control" id="name" require>
             <span class="text-danger nameError"></span>
           </div>
           <div class="mb-3">
            <label for="message-text" class="col-form-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control">
            <span class="text-danger titleError"></span>
          </div>
           <div class="mb-3">
             <label for="message-text" class="col-form-label">Institute:</label>
             <input type="text" name="institute" id="institute" class="form-control">
             <span class="text-danger instituteError"></span>
           </div>
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" onclick="addTeacher()" class="btn btn-primary">Send message</button>
       </div>
     </div>
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
function clearData(){
                $('#name').val('');
                $('#title').val('');
                $('#institute').val('');
                $('.nameError').text('');
                $('.titleError').text('');
                $('.instituteError').text('');
}

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

                clearData()
                $('#exampleModal').modal('hide');
            },error:function(error){
                $('.nameError').text(error.responseJSON.errors.name);
                $('.titleError').text(error.responseJSON.errors.title);
                $('.instituteError').text(error.responseJSON.errors.institute);
            }
        });
    }

</script>
@endsection
