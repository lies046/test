$('.like').on('click', function (){
    let postId = $(this).attr('id');
    $.ajax({
        url: "/like",
        type: "POST",
        dataType: "json",
        data:{
            post_id: postId,
        }
    })

})