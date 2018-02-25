


 /*   function subscription()
    {
        $("#subscription").on('submit', function () {
            var date = $("#subscription").serialize();
            alert(date);
            //var autorId = ;
            $.ajax({
                type: 'post',
                url: '/subscription/' + autorId,
                data: date,
                success: function (response) {

                },
                error: function () {
                    alert('error');
                }
            });
            return false;
        });
    }*/


    $(document).ready(function(){
        $("#subscription").submit(function() {
            var data = $("#subscription").serialize();
            var autorId =$('#autorId').val()
            $.ajax({
                type: 'post',
                url: '/subscription/' + autorId,
                data: data,
                success: function(response) {
                   alert('111');
                },
                error: function(){
                }
            });
            return false;
        });
    })
