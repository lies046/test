$('.like').on('click', function (){
    let postId = $(this).attr('id');
    let userId = $('#user_id').data('user-id');
    $.ajax({
        url: "/like",
        type: "POST",
        dataType: "json",
        data:{
            "post_id": postId,
            "user_id": userId
        }
    })

})