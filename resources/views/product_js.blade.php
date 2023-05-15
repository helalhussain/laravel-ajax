<script>
$(document).ready(function(){
    $(document).on('click','.add_product',function(e){
        e.preventDefault();
        let name = $('.name').val();
        let price = $('.price').val();
        // console.log(name+price);


    $.ajax({
        url:"{{ route('product.store') }}",
        method:'post',
        data:{name:name,price:price},
        success:function(res){
            if(res.status=='success'){
                $('#addModal').modal('hide');
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
