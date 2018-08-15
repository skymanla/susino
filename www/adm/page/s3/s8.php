<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$aType = (isset($_GET['aType']) ? $_GET['aType'] : "shopper");
$stx = (isset($_GET['stx']) ? $_GET['stx'] : "");
$sval = (isset($_GET['sval']) ? $_GET['sval'] : "");
?>
<script>
$(function(){
	ajax_review("<?=$aType?>", "1", "<?=$stx?>", "<?=$sval?>");
});
</script>
<section class="section1">
	<h3>후기작성 관리</h3>

	<div id="view_container">
	</div>
</section>
<script type="text/javascript" src="/adm/js/jquery-ui.min.js"></script>
<script>
function all_check(){
    if($('#all_check').is(':checked')){
        $(".rp_check_class").prop("checked", true);
    }else{
        $(".rp_check_class").prop("checked", false);   
    }
}

function all_check_t(){
    $(".rp_check_class").prop("checked", true);
}

function all_check_f(){
    $(".rp_check_class").prop("checked", false);
}

function move_page(aType){
	if(aType == "once"){
		location.href="./s8s_tab5.php";
	}else if(aType == "five"){
		location.href="./s8s_tab6.php";
	}else{
		location.href="./s8.php?aType="+aType;
	}
}

function stxchg(getVal){
	var Pt = getVal.parentNode.getElementsByClassName('w_input1');
	if(getVal.value == "pdate"){
		Pt[1].setAttribute('id', 'inp_date');
		$('#inp_date').datepicker({
			dateFormat: 'yy-mm-dd',
			maxDate : 0
		});
	}else{
		$('#inp_date').datepicker("destroy");
		Pt[1].removeAttribute('id');
	}
}

function ajax_review(aType, cur_page, getStx, getSval, getEtype){
	if(aType=="selfer"){
		var url = "/ajax/adm_review_list_selfer.php";
	}else{
		var url = "/ajax/adm_review_list.php";
	}
	$.ajax({
		type : "POST",
		data : {"aType" : aType, "cur_page" : cur_page, "stx" : getStx, "sval" : getSval, "Etype" : getEtype},
		contentType : "application/x-www-form-urlencoded",
		url : encodeURI(url),
		success : function(result){			
			$('#view_container').html(result);
			if($("select[name=stx] option:selected").val() == "pdate"){				
				$("select[name=stx]").siblings($('input[name=sval]')).attr("id", "inp_date");
				$('#inp_date').datepicker({
					dateFormat: 'yy-mm-dd',
					maxDate : 0
				});		
			}
		},error : function(){
			console.log('errrrr');
		}
	});
}

function review_accpect(getfIdx, getIdx, val){
	if(val.trim() == ''){
		alert("승인번호를 입력해 주세요.");
		return false;
	}else{
		$.ajax({
			type : "POST",
			data : {"getfIdx" : getfIdx, "getIdx" : getIdx, "getVal" : val},
			dataType : "json",
			url : "/ajax/adm_review_accept_ok.php",
			success : function(result){
				alert(result.msg);
				location.reload();
			}, error : function(){
				console.log('errrrrr');
			}
		});
	}
}

function review_refuse_se(getIdx){
	var chk_data = new Array()
	var chk_cnt = 0;
	var chkbox = $('.rp_check_class');

	for(var i=0;i<chkbox.length;i++){
		if(chkbox[i].checked == true){
			chk_data[chk_cnt] = chkbox[i].value;
			chk_cnt++;
		}
	}

	if(chk_data == ""){
		alert("거절할 회원은 선택하세요.");
		return false;
	}

	$.ajax({
		type : "POST",
		dataType : "json",
		data : {"getIdx" : getIdx, "refuse_member" : chk_data},
		url : "/ajax/adm_refuse_member.php",
		success : function(result){
			alert(result.msg);
			location.reload();
		}, error : function(){
			console.log('errrrr');
		}
	});
}

function sms_save(getIdx, getVal){
	var Pt = getVal.parentNode.previousSibling.previousSibling.value;
	if(Pt.trim() == ''){
		alert("거절할 내용을 입력해주세요");
		return false;
	}
	$.ajax({
		type : "POST",
		data : {"getIdx" : getIdx, "getVal" : Pt},
		dataType : "json",
		url : "/ajax/review_refuse_template.php",
		success : function(result){
			alert(result.msg);
			location.reload();
		}, error : function(){
			console.log('errrrr');
		}
	});
}
</script>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>