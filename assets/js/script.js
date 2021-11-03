$(".remove").click(function(){
    var id =$(this).parents("tr").attr("id");
    if(confirm('Are you sure to remove this article ?'))
    {
        $.ajax({
           url: '/index.php',
           type: 'GET',
           data: {id: id},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                $("#"+id).remove();
           }
        });
    } else {
        return false
    }
})
