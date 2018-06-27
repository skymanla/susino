(function($){
	$.fn.wInstarSns = function(options) {
		var defaults = {
			w_imgSize : '1', // 0~4 이미지 퀄리티
			w_grid : '5', // 몇열로 나눌것인가
			w_count : '20', // 토탈 리스팅 갯수 max 50
			w_tag : ['윈드디자인'], // 타겟 태그
			noShortcode : [], // 리젝시킬 숏코드
		};
		var opts = $.extend(defaults, options);
		return this.each(function(){
			var _this = $(this);
			var newList = [];
			var noId = [];
			$.each(opts.w_tag,function (i,d){
				$.ajax({
					type: 'GET',
					url: 'https://www.instagram.com/explore/tags/'+opts.w_tag[i]+'/?__a=1',
					async: false,
					dataType: 'json',
					data: ''
				}).done(function(data) {
					$.each(data.graphql.hashtag.edge_hashtag_to_media.edges,function (i,d){
						$.each(opts.noShortcode,function (i,c){
							if(d.node.shortcode==c){
								noId.push(d.node.owner.id);
							}
						});
						var wPush = true;
						$.each(noId,function (i,c){
							if(d.node.owner.id == c){
								wPush = false;
							}
						});
						if(wPush){
							newList.push(d);
						}
					});
				}).fail(function() {
					//alert('error');
				}).always(function() {

				});
			});
			if(opts.w_tag.length > 1){
				newList.sort(function(){return 0.5-Math.random()});
			}

			var w_grid = (100/opts.w_grid).toFixed(4);
			//-->설정된 태그의 총 개수인 듯 Ryan
			//console.log(newList.length);
			_this.append('<div class="wInstarSns"></div>');
			$.each(newList,function (i,d){
				if(i < opts.w_count){
					var w_html = '<div class="item" style="width:'+w_grid+'%;">'+
											'<a href="https://www.instagram.com/p/'+d.node.shortcode+'" target="_blank" title="새창으로 열립니다.">'+
												'<div class="over">'+
													'<div>'+
														'<span class="like">'+d.node.edge_liked_by.count+'개</span>'+
														'<span class="comment">'+d.node.edge_media_to_comment.count+'개</span>'+
													'</div>'+
												'</div>'+
												'<img src="'+d.node.thumbnail_resources[opts.w_imgSize].src+'" alt="" />'+
											'</a>'+
										'</div>';


					_this.find('.wInstarSns').prepend(w_html);
				}
			});
			$(window).on('load',function(){
				_this.find('.item').addClass('active');
			});
		});
	};
})(jQuery);