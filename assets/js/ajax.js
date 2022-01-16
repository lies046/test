$(document).on('click', '.like', function (){
    let postId = $(this).data('post-id');
    let userId = $('#user_id').data('user-id');
    $.ajax({
        url: "/like",
        type: "POST",
        dataType: "json",
        data:{
            "post_id": postId,
            "user_id": userId
        }
    }).done(function (data){
        if (data.result === 'success'){
            console.log(data.postId);
            // console.log('[data-post-id="' + postId + '"]')
            $('[data-post-id="' + postId + '"]').removeClass('far fa-heart like').addClass('fas fa-heart dislike')
        }
    })

})