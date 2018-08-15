<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$aType = (isset($_GET['aType']) ? $_GET['aType'] : "shopper");
$stx = (isset($_GET['stx']) ? $_GET['stx'] : "");
$sval = (isset($_GET['sval']) ? $_GET['sval'] : "");
?>

<script>
$(function(){
	ajax_review_excel("<?=$aType?>", "1", "<?=$stx?>", "<?=$sval?>");
});
</script>

<section class="section1">
	<h3>엑셀 관리</h3>
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
		location.href="./s9s_tab5.php";
	}else if(aType == "five"){
		location.href="./s9s_tab6.php";
	}else{
		location.href="./s9.php?aType="+aType;
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

function ajax_review_excel(aType, cur_page, getStx, getSval, getEtype){
	if(aType=="selfer"){
		var url = "/ajax/adm_review_excel_list_selfer.php";
	}else{
		var url = "/ajax/adm_review_excel_list.php";
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

function review_excel_download(bType, cType){
	if(cType == "a"){
		var chk_data = new Array()
		var chk_cnt = 0;
		var chkbox = $('.rp_check_class');

		for(var i=0;i<chkbox.length;i++){
			if(chkbox[i].checked == true){
				chk_data[chk_cnt] = chkbox[i].value;
				chk_cnt++;
			}
		}
		if(chk_data == ''){
			alert("엑셀 다운로드할 항목을 선택해 주세요.");
			return false;
		}
	}else if(cType == "b"){
		var chk_data = "all";
	}
	<? if($aType=="selfer"){ ?>
	location.href="/ajax/adm_review_excel_selfer_download.php?aType=<?=$aType?>&bType="+bType+"&cType="+cType+"&chk_data="+chk_data;
	<? }else{ ?>
		location.href="/ajax/adm_review_excel_download.php?aType=<?=$aType?>&bType="+bType+"&cType="+cType+"&chk_data="+chk_data;
	<? } ?>
}
</script>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>