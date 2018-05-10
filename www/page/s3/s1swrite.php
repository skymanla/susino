<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/Session.php");
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');

if($_GET['mode'] == 'u')
{
	$mode = 'u';
	$query = "SELECT * FROM sb_store where sbs_idx = '".$_GET['idx']."'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
}
else
{
	$mode = 'w';
	$row['sbs_no'] = 0;
	$row['sbs_new'] = 1;
	$row['sbs_type'] = 1;
}
?>
<script>
// submit 최종 폼체크
function write_ok()
{
	var f = document.forms.myform3;

	var w_rull_check2 = $('input[name="new"]').is(":checked");

	if(!w_rull_check2) 
	{
		alert('신규매장을 체크해주세요.');
		$('input[name="new"]').focus();
		return false;
	}

	if(f.name.value == '') 
	{
		alert('매장명을 입력하세요.');
		f.title.focus();
		return false;
	}

	var w_rull_check = $('input[name="type"]').is(":checked");

	if(!w_rull_check) 
	{
		alert('매장타입을 체크해주세요.');
		$('input[name="type"]').focus();
		return false;
	}

	if(f.series.value == '') 
	{
		alert('SERIES릏 입력하세요.');
		f.series.focus();
		return false;
	}

	if(f.address.value == '') 
	{
		alert('주소를 입력하세요.');
		f.address.focus();
		return false;
	}

	if(f.tel.value == '') 
	{
		alert('전화번호를 입력하세요.');
		f.tel.focus();
		return false;
	}

	if(f.link1.value == '') 
	{
		alert('네이버플레이스 링크를 입력하세요.');
		f.link1.focus();
		return false;
	}

	f.action = '../../lib/write_ok.php';
	f.submit();
}

function del()
{
	var f = document.forms.myform3;

	var conf = confirm("정말삭제하시겠습니까?");
	if (conf) 
	{
		f.method = "post";
		f.flag.value = $('#flag').val();
		f.mode.value = "d";
		f.idx.value = $('#idx').val();
		f.action = '../../lib/write_ok.php';
		f.submit();
	}
}
</script>

<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/s3_title1.png" alt="백쉐프 초밥집 찾기" /></h2>
<!-- 		<p class="desc">
			누구든 초밥을 즐길 수 있도록 다른 컨셉의 매장을 운영하고 있습니다. <br />
			현대미와 전통미가 어우러지는 스시노백쉐프에서 수제초밥을 즐겨보세요.
		</p> -->
	</div>
	<div class="con_wrapStyle1">
		<div class="cst_con">
			<form id="myform3" name="myform3" method="post">
			<input type="hidden" name="flag" id="flag" value="store">
			<input type="hidden" name="mode" id="mode" value="<?php echo $mode?>">
			<?php
			if($_GET['idx'])
			{
			?>
			<input type="hidden" name="idx" id="idx" value="<?php echo $_GET['idx']?>">
			<?php
			}
			?>
			<table class="board_style1">
				<caption>이벤트 정보입력란</caption>
				<colgroup>
					<col width="160" />
					<col width="" />
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">
							<label for="">출력순서</label>
						</th>
						<td>
							<input type="text" name="no" id="" value="<?php echo $row['sbs_no']?>" style="width:100px;text-align:center;" />
							<p class="text1" style="margin-top:5px;">
								* 기본 출력 순서는 최신 등록 순입니다. <br />
								* 기본 값은 0이며 숫자가 높을수록 먼저 출력됩니다.
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="">신규매장</label>
						</th>
						<td>
							<div class="radio_wrap jquery_checked">
								<div>
									<input type="radio" name="new" value="1" id="info_newold1" <?php if($row['sbs_new'] == 1){ echo "checked"; } ?> />
									<label for="info_newold1"><i></i>기존매장</label>
								</div>
								<div>
									<input type="radio" name="new" value="2" id="info_newold2" <?php if($row['sbs_new'] == 2){ echo "checked"; } ?> />
									<label for="info_newold2"><i></i>신규매장</label>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="">매장명</label>
						</th>
						<td>
							<input type="text" name="name" id="" value="<?php echo $row['sbs_name']?>" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="">매장타입</label>
						</th>
						<td>
							<div class="radio_wrap jquery_checked">
								<div>
									<input type="radio" name="type" value="1" id="info_type1" <?php if($row['sbs_type'] == 1){ echo "checked"; } ?> />
									<label for="info_type1"><i></i>다이닝</label>
								</div>
								<div>
									<input type="radio" name="type" value="2" id="info_type2" <?php if($row['sbs_type'] == 2){ echo "checked"; } ?> />
									<label for="info_type2"><i></i>컴팩트</label>
								</div>
								<div>
									<input type="radio" name="type" value="3" id="info_type3" <?php if($row['sbs_type'] == 3){ echo "checked"; } ?> />
									<label for="info_type3"><i></i>강남★스타</label>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="">SERIES</label>
						</th>
						<td>
							<input type="text" name="series" id="" value="<?php echo $row['sbs_series']?>" maxlength="6" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="">주소</label>
						</th>
						<td>
							<div class="postcode_wrap">
								<div class="postcode_bt">
									<input type="text" name="zip" id="sample4_postcode" value="<?php echo $row['sbs_zip']?>" placeholder="우편번호" readonly style="width:150px">
									<input type="button" onclick="sample4_execDaumPostcode()" value="우편번호 찾기">
								</div>
								<input type="text" name="address" id="sample4_roadAddress" value="<?php echo $row['sbs_address']?>" placeholder="도로명주소" readonly>
								<input type="text" name="address2" id="sample4_jibunAddress" value="<?php echo $row['sbs_address2']?>" placeholder="지번주소" readonly>
								<span id="guide" style="color:#999"></span>
							</div>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="">전화번호</label>
						</th>
						<td>
							<input type="text" name="tel" id="" value="<?php echo $row['sbs_tel']?>" maxlength="13" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="">네이버플레이스 링크</label>
						</th>
						<td>
							<input type="text" name="link1" id="" value="<?php echo $row['sbs_link1']?>" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="">자세히보기 링크</label>
						</th>
						<td>
							<input type="text" name="link2" id="" value="<?php echo $row['sbs_link2']?>" />
						</td>
					</tr>
				</tbody>
			</table>
			</form>
		</div>
		<div class="cst_rWrap">
			<?php
			if($_SESSION['sba_id'] && $_GET['mode'] == 'u')
			{
			?>
			<button type="button" class="bt_s1_gray"  onclick="del();">삭제</button>
			<?php
			}
			?>
			<button type="button" class="bt_s1_gray" onclick="location.href='/page/s3/s1.php'">취소</button>
			<button type="submit" class="bt_s1_red" onclick="write_ok();">등록</button>
		</div>
	</div>
</div>

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
    //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
    function sample4_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 도로명 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
                var extraRoadAddr = ''; // 도로명 조합형 주소 변수

                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraRoadAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if(data.buildingName !== '' && data.apartment === 'Y'){
                   extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 도로명, 지번 조합형 주소가 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if(extraRoadAddr !== ''){
                    extraRoadAddr = ' (' + extraRoadAddr + ')';
                }
                // 도로명, 지번 주소의 유무에 따라 해당 조합형 주소를 추가한다.
                if(fullRoadAddr !== ''){
                    fullRoadAddr += extraRoadAddr;
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample4_postcode').value = data.zonecode; //5자리 새우편번호 사용
                document.getElementById('sample4_roadAddress').value = fullRoadAddr;
                document.getElementById('sample4_jibunAddress').value = data.jibunAddress;

                // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
                if(data.autoRoadAddress) {
                    //예상되는 도로명 주소에 조합형 주소를 추가한다.
                    var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
                    document.getElementById('guide').innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';

                } else if(data.autoJibunAddress) {
                    var expJibunAddr = data.autoJibunAddress;
                    document.getElementById('guide').innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';

                } else {
                    document.getElementById('guide').innerHTML = '';
                }
            }
        }).open();
    }
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>