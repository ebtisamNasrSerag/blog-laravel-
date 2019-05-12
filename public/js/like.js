$('.like').on('click',function(){
	
	var likes = $(this).attr('data-like');
	var post_id = $(this).attr('data-postId');
	post_id = post_id.slice(0,-2);

	$.ajax({
		type : 'POST',
		url  : url,
		data : {likes : likes ,post_id : post_id,_token : token},
		success : function(data){
			var l = $('*[data-postId="'+ post_id +'_l"]');
			var d = $('*[data-postId="'+ post_id +'_d"]');
			if(data.is_like == 1){
             l.removeClass('btn-secondry').addClass('btn-success ');
             d.removeClass('btn-danger').addClass('btn-secondry');

             var count_like = l.find('.like_count').text();

             var new_like = parseInt(count_like)+1;
             l.find('.like_count').text(new_like);

             if(data.change_like == 1){
             	var count_dislike = d.find('.dislike_count').text();

                var new_dislike = parseInt(count_dislike)-1;
                d.find('.dislike_count').text(new_dislike);
             } 

			}
			if(data.is_like == 0){
             l.removeClass('btn-success').addClass('btn-secondry');

             var count_like = l.find('.like_count').text();

             var new_like = parseInt(count_like)-1;
             l.find('.like_count').text(new_like);
			}
		},
	});
});

$('.dislike').on('click',function(){
	
	var likes = $(this).attr('data-like');
	var post_id = $(this).attr('data-postId');
	post_id = post_id.slice(0,-2);

	$.ajax({
		type : 'POST',
		url  : url_d,
		data : {likes : likes ,post_id : post_id,_token : token},
		success : function(data){
			var l = $('*[data-postId="'+ post_id +'_l"]');
			var d = $('*[data-postId="'+ post_id +'_d"]');
			if(data.is_dislike == 1){
             d.removeClass('btn-secondry').addClass('btn-danger ');
             l.removeClass('btn-success').addClass('btn-secondry ');

             var count_dislike = d.find('.dislike_count').text();

             var new_dislike = parseInt(count_dislike)+1;
             d.find('.dislike_count').text(new_dislike);
             location.reload();

             if(data.change_dislike == 1){
             	var count_like = l.find('.like_count').text();

                var new_like = parseInt(count_like)-1;
                l.find('.like_count').text(new_like);
             }
			}
			if(data.is_dislike == 0){
             d.removeClass('btn-danger').addClass('btn-secondry');
			}
			var count_dislike = d.find('.dislike_count').text();

             var new_dislike = parseInt(count_dislike)-1;
             d.find('.dislike_count').text(new_dislike);
		},
	});
});