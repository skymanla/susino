<?php
include_once "../../_head.php";
?>
<div class="wrap_conts">
	<div class="hd_s_img">
		<h2><img src="/m/img/s6/s6s1_tit.png" alt="이달의 이벤트" /></h2>
	</div>
	<!-- STR 글쓰기 -->
	<!-- 
	<div class="bt_wrap_right" style="margin-bottom:10px;">
		<a href="/m/page/s6/s1swrite.php" class="bt_3s_c_border">글쓰기</a>
	</div>
	 -->
	<!-- END 글쓰기 -->
	<div class="wrap_evnt_area">
		<input type="hidden" name="pageNum" value="1" />
		<ul>
			<!-- STR 등록된 글이 없을때 -->
			<!-- 
			<li class="none_word">등록된 이벤트가 없습니다.</li>
			 -->
			<!-- END 등록된 글이 없을때 -->
		</ul>
		<button type="button" onclick="event_page('1');" class="bt_2s_c_more">더보기<i></i></button>
	</div>

</div>
<script>
$(function(){
	event_page('1');
});
function event_page(getPage){
	var pageNum = $('input[name=pageNum]').val();
	$.ajax({
		type : "POST",
		data : {"cur_page" : pageNum},
		url : "/ajax/mobile_eventboard_list.php",
		success : function(result){
			if(result == 99){
				//<li class="none_word">등록된 이벤트가 없습니다.</li>
				if(pageNum == "1"){
					var html_data = '<li class="none_word">등록된 이벤트가 없습니다.</li>';
					$('.bt_2s_c_more').hide();
					$('.wrap_evnt_area > ul').html(html_data);	
				}else{
					$('.bt_2s_c_more').hide();
				}
			}else{
				$('input[name=pageNum]').val(Number(pageNum)+1);
				if(pageNum == "1"){
					$('.wrap_evnt_area > ul').html(result);	
					$('.wrap_evnt_area > ul > li').last().addClass('pagination')
				}else{
					$('.wrap_evnt_area > ul > .pagination').after(result);
					$('.wrap_evnt_area > ul > li').removeClass('pagination')
					$('.wrap_evnt_area > ul > li').last().addClass('pagination')
				}
			}
		}, error : function(){
			console.log('errrrr');
		}
	});
}
</script>
<?php include_once "../../_tail.php";?>