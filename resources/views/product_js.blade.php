<script>
$(document).ready(function(){
    $(document).on('click','.add_product',function(e){
        e.preventDefault();
        let name = $('.name').val();
        let price = $('.price').val();
     //   console.log(name+price);


    $.ajax({
        url:"{{ route('product.store') }}",
        method:'post',
        data:{name:name,price:price},
        success:function(res){
            if(res.status=='success'){
                $('#addModal').modal('hide');
                $('#addForm')[0].reset();
                $('.table').load(location.href+' .table');
            }
            },error:function(err){
                let error = err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errorMsgContainer').append('<span>'+value+'</span>'+'<br>');
                    $('.errorMsgContainer').addClass('text-danger');
                });
            }
        });
    })

    $(document).on('click','.edit_product_model',function(e){

        let id = $(this).data('id');
        let name = $(this).data('name');
        let price = $(this).data('price');
        $('#up_id').val(id);
        $('#up_name').val(name);
        $('#up_price').val(price);
    });
    $(document).on('click','.update_product',function(e){
        e.preventDefault();
        let = up_id = $('.edit_id').val();
        let up_name = $('.edit_name').val();
        let up_price = $('.edit_price').val();

        $.ajax({
            url:"{{ route('product.store') }}",
            method:'post',
            data:{up_id:up_id,up_name:up_name,up_price:up_price},
            success:function(res){
                if(res.status=='success'){
                    $('#updateModal').modal('hide');
                    $('#updateForm')[0].reset();
                    $('.table').load(location.href+' .table');
                }
            },error:function(err){
                let error = err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errorMsgContainer').append('<span>'+value+'</span>'+'<br>');
                    $('.errorMsgContainer').addClass('text-danger');
                });
            }
        });




    })
});
</script>
