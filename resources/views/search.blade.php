<script>
    $(document).ready(function(){
        $('#sear_bar').on('keyup',function(){
            var value = $(this).val();
            // alert(value);
            $.ajax({
                url:"{{ route('index') }}",
                type:"GET",
                data:{'name':value},
                success:function(data){
                    $('#search_list').html(data);
                }
            });
        });
        $(document).on('click','li',function(){
            var value = $(this).text();
            $('#sear_bar').val(value);
            $('#search_list').html("");
        });
    });
</script>
