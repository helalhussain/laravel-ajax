@extends('app')
@section('content')

<div class="col-lg-5 mx-auto">

    <h2 class="text-center text-success my-3">Laravel Yajra box</h2>

    <div class="table-responsive mt-2">
        <table class="table table-light p-2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $users = App\Models\User::all();
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                    </tr>
                @endforeach

            </tbody>
        </table>

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
        $('#example').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:'{{ URL::to('/user') }}'
            },columns:
            [
                {
                    data:'name',
                    name:'name',
                },
                {
                    data:'email',
                    emal:'email'
                }
            ]
        })
    })
</script>
@endsection
