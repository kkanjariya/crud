/**
 * Created by artixun on 5/7/18.
 */

$(document).ready(function () {

    $(document).on('click','#btn-more',function () {

        var id = $(this).data('id');
        $("btn-more").html("Loding...");
        $.ajax({
            url : '{{url("article")}}',
            method : "Post",
            data: {id:id, _token:"{{csrf_token()}}"},
            dataType: "text",
            success : function (data) {
                if(data != '')
                {
                    $('#remove-row').remove();
                    $('#load-data').append(data);
                }
                else
                {
                    $('#btn-more').html("No Data");

                }
                
            }

        });
    });
});