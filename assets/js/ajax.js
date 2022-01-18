$(document).on('click', '.like', function (){
    let postId = $(this).data('post-id');
    let userId = $('#user_id').data('user-id');
    $.ajax({
        url: "/like",
        type: "POST",
        dataType: "json",
        data:{
            "like": "like",
            "post_id": postId,
            "user_id": userId
        }
    }).done(function (data){
        if (data.result === 'success'){
            $('[data-post-id="' + data.postId + '"]').removeClass('far fa-heart like').addClass('fas fa-heart dislike')
        }
    })

})

$(document).on('click', '.dislike', function (){
    let postId = $(this).data('post-id');
    let userId = $('#user_id').data('user-id');
    $.ajax({
        url: "/like",
        type: "POST",
        dataType: "json",
        data:{
            "like": "dislike",
            "post_id": postId,
            "user_id": userId
        }
    }).done(function (data){
        if (data.result === 'success'){
            $('[data-post-id="' + data.postId + '"]').removeClass('fas fa-heart like').addClass('far fa-heart like')
        }
    })

})