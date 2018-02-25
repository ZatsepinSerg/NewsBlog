

    $(document).ready(function(){
        $("#subscription").submit(function() {
            var data = $("#subscription").serialize();
            var autorId =$('#autorId').val()
            $.ajax({
                type: 'post',
                url: '/subscription/' + autorId,
                data: data,
                success: function(response) {
                   alert('Вы подписаны');
                },
                error: function(){
                }
            });
            return false;
        });


        $("#commentForm").submit(function() {
            var data = $("#commentForm").serialize();
            $.ajax({
                type: 'post',
                url: '/comment' ,
                data: data,
                success: function(response) {

                    $('.comments').append(response);
                },
                error: function(){
                }
            });
            return false;
        });


        $(".parenCommentForm").submit(function() {
            var data = $("#"+this.id).serializeArray();
            var articleId =  data[2].value;
            var parentId =  data[1].value;

            $.ajax({
                type: 'post',
                url: '/article/' + articleId +'/comment/' + parentId +'/parent' ,
                data: data,
                success: function(response) {
                    $('#parenCommentForm_'+ parentId).hide();
                    $('.commentParent_' + parentId).append(response);
                    $('#commentParent_'+ parentId).removeClass('hidden');
                },
                error: function(){
                }
            });
            return false;
        });

    })
