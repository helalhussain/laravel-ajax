@extends('app')
@section('content')

<div class="col-lg-5 mx-auto">

    <h2 class="text-center text-success my-3">Laravel AJAX</h2>

    <!---Model start--->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#addModal" data-bs-whatever="@getbootstrap">Create</button>

    <div class="modal fade bg-dark" id="addModal" tabindex="-1"
     aria-labelledby="addModalLabel"
     aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="addModalLabel">Add new product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="{{ route('product.store') }}" id="addForm" method="POST">
            @csrf

          <div class="modal-body">
            <div class="errorMsgContainer"></div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Name</label>
                <input type="text"  name="name" class="form-control name" id="names recipient-name">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Price</label>
                <input type="text" name="price" class="form-control price" id="price recipient-name">
              </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary add_product">Insert</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!---Model End---->
    <div class="table-responsive mt-2">

        @csrf
        <input type="text" id="sear_bar" name="name" class="form-control"
         placeholder="Search...">
        <div id="search_list">

        </div>

        <table class="table table-light p-2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
               {{-- @foreach ($products as $product)
               <tr class="">
                <td scope="row">{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price }}</td> --}}
                {{-- <td>
                    <a  class="btn btn-success edit_product_model" data-bs-toggle="modal"
                    data-id="{{ $product->id }} " data-name="{{ $product->name }}"
                         data-price="{{ $product->price }}"
                    data-bs-target="#updateModal"  data-bs-whatever="@getbootstrap">Edit</a>

                    <div class="modal fade bg-dark" id="updateModal" tabindex="-1"
                     aria-labelledby="editModalLabel"
                     aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Edit</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <form action="{{ route('product.update') }}" id="updateForm" method="POST">
                            @csrf

                          <div class="modal-body">
                            <div class="errorMsgContainer"></div>
                            <input type="hidden"
                                class="edit_id" id="up_id" placeholder="Name"
                                id="up_name">
                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Name</label>
                                <input type="text"
                                name="name" class="form-control edit_name" placeholder="Name"
                                id="up_name">
                              </div>
                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Price</label>
                                <input type="text" id="up_price"
                                name="price" class="form-control edit_price"
                                placeholder="Price">
                              </div>


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary update_product">Update</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                </td> --}}
            {{-- </tr> --}}
               {{-- @endforeach --}}
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

@include('product_js');
@include('search');
@endsection
