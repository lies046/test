$(document).on('click', '.like', function (){
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
    }).done(function (data){
        if (data === 'success'){
            $('#'+ postId).removeClass('far fa-heart like').addClass('fas fa-heart test')
            return false;
        }
    })

})