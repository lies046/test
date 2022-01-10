$('.like').on('click', function (){
    let postId = $(this).attr('id');
    $.ajax({
        url: '/like',
        type: 'post',
        dataType: 'json',
        data:{
            'id': postId,
            'name': 'hello'
        }
    })

})