
</div>
    </div>
<script>
    $('.delete').click(function (){
        var tableName = $(this).attr('data-table')
        var fieldName = $(this).attr('data-field')
        var id        = $(this).attr('data-id');
        console.log(tableName, fieldName, id);
        
        $.ajax({
            type: "GET",
            url : "<?php echo BURL_ADMIN . 'inc/delete.php' ?>",
            data: {
                tableName : tableName,
                fieldName : fieldName,
                id        : id
            },
            dataType: "JSON",
            success: function (data)
            {
                if(data.message == 'success'){
                    alert(data.message);
                }
            },
            error: function(data){

                    alert(data.message);

            }
        })
    });
</script>
</body>
</html>