<?
//썸네일 이미지 생성 함수
function thumbnail($file1, $save_filename, $max_width, $max_height) 
{
	if(strtolower(substr($file1,strlen($file1)-3))=="gif")
	{
		$src_img = imagecreatefromgif($file1);
	}
	else if(strtolower(substr($file1,strlen($file1)-3))=="jpg")
	{ 
		$src_img = imagecreatefromjpeg($file1);
	}
	else if(strtolower(substr($file1,strlen($file1)-3))=="png")
	{ 
		$src_img = imagecreatefrompng($file1);
	}
	
	$img_info = getImageSize($file1);//원본이미지의 정보를 얻어옵니다
	$img_width = $img_info[0];
	$img_height = $img_info[1];
	
	$dst_width=$max_width;
	$dst_height=$max_height;
	
	$dst_img = imagecreatetruecolor($dst_width, $dst_height); //타겟이미지를 생성합니다
	imageCopyResampled($dst_img, $src_img, 0, 0, 0, 0, $dst_width, $dst_height, $img_width, $img_height); //타겟이미지에 원하는 사이즈의 이미지를 저장합니다
	
	ImageInterlace($dst_img);
	ImageJPEG($dst_img, $save_filename); //실제로 이미지파일을 생성합니다
	ImageDestroy($dst_img);
	ImageDestroy($src_img);
}

//단일 파일 등록 프로세스 함수(디버깅 포함)
function upSingleFile($name,$src)
{
	//업로드할 폴더 생성
	$board_file_savedir = $src;
	if(!is_dir($board_file_savedir))
	{
		mkdir($board_file_savedir, 0777);
	}

	if( is_uploaded_file($_FILES[$name]['tmp_name']) )
	{
		$prefix = substr(md5(uniqid(time())),0,10);

		$arr_file = explode(".",$_FILES[$name]['name']);
		$file_ext = $arr_file[1];   //파일확장자
				
		//$upload[$i] = "{$prefix}.{$file_ext}"; // 최종 파일명
		$filename = "{$prefix}.{$file_ext}"; // 최종 파일명 
		//업로드시 파일명에 특수문자 제거
		$new_filename = time()."_".$filename;
		$specialList = array("!","@","#","$","%","^","&","*","+","-","|","`","~",":",";","'","/"," ","?",">","<","=");
		for($i=0;$i<count($specialList);$i++)
		{
			$new_filename = str_replace($specialList[$i],'',$new_filename);
		}
		
		$files = $board_file_savedir.$new_filename;
		
		//마지막으로 업로드 실패시,
		if (!move_uploaded_file($_FILES[$name]['tmp_name'], $files)) 
		{
			echo "<script language='javascript'>alert('파일전송 실패! 다시 업로드해주세요.');history.back();</script>";
			exit;
		}
	}
	else
	{
		$new_filename = "";
	}
	return $new_filename;
}

//htmlCheck유무를 간단히 사용하기 위해서
function htmlCheck($data,$check)
{
	switch($check)
	{
		case "N" :
			$data = htmlspecialchars($data);
			$data = nl2br($data);
			break;
		default : 
			$data = $data;
			break;
	}
	return $data;
}

//-- 파일 업로드 함수
function UPLOAD_FILE($path,$limitsize,$fileCnt=1)
{
	global $HTTP_POST_FILES;
	global $dbjob;
	// 실행가능한 스크립트 확장자
	$source = array ("/\.php/", "/\.htm/", "/\.cgi/", "/\.pl/");
	$target = array (".phpx", ".htmx", ".cgix", ".plx");
	// 파일 업로드
	for ($i=1; $i<=$fileCnt; $i++) 
	{
		$is_up[$i] = false;
		$tmp_file = $HTTP_POST_FILES["file$i"][tmp_name];
		$filename = $HTTP_POST_FILES["file$i"][name];
		$filesize = $HTTP_POST_FILES["file$i"][size];
  

		// 파일 삭제에 체크가 되어 있다면 기존의 업로드된 파일을 삭제
		/*if ($HTTP_POST_VARS["isfile$i"]) {
		@unlink($_SERVER["DOCUMENT_ROOT"]."/upfile/");
		$upload[$i] = "";
		$is_up[$i] = true;
		}*/

		// 업로드 가능하다면
		if (is_uploaded_file($tmp_file) && $filename) 
		{
			// 수정이면서 기존의 자료가 있다면 삭제
			if ($dbjib=='u' && $wr["file$i"]) 
			{
				unlink($path);
			}

			// 설정한 업로드 사이즈보다 크다면 건너뜀
			if ($filesize > $limitsize) 
			{
				continue;
			}

			$prefix = substr(md5(uniqid(time())),0,12);
			//$prefix = substr(uniqid(time()),0,13);
			// 프로그램 원래 파일명
			$upload_source[$i] = $filename;

			// php_x 와 같은 방법으로 스크립트 실행을 하지 못하게 하였으나 abc.php._x 는 실행되는 버그가 있음

			$filename = preg_replace($source, $target, $filename);
			// 접두사를 붙인 파일명
			$arr_file = explode(".",$filename);
			$file_ext = $arr_file[1];   //파일확장자
			
			//$upload[$i] = "{$prefix}.{$file_ext}"; // 최종 파일명
			$filename = "{$prefix}.{$file_ext}"; // 최종 파일명 
			//$upload[$i] = $prefix . $filename;
			
			$upload_size[$i] = $filesize;
			$dest_file = "{$path}{$filename}";
		
			//해당폴더 파일유무 검사
			if(file_exists($dest_file))
			{
				$num = 1;
				while(file_exists($dest_file))
				{
					$filename = "{$prefix}[".($num)."].{$file_ext}";
					$dest_file = "{$path}{$filename}";
					$num++;
				}
			}
						
			$UPLOADARR[$i][file_name] = $filename;
			$UPLOADARR[$i][file_size] = $filesize;
			$UPLOADARR[$i][file_full_path] = $dest_file;


			//업로드폴더 생성및 권한설정
			if(!file_exists($path))
			{
				@mkdir($path , 0707);
				@chmod($path, 0707);
			}

			move_uploaded_file($tmp_file, $dest_file) or die($HTTP_POST_VARS["file$i"][error]);
			//chmod($dest_file, 0606);

			$is_up[$i] = true;
		}
	}
	return $UPLOADARR;
}

//############# 팝업 메세지 ##################
//메세지, 유알엘, alter 타입
function go_href($msg,$url,$ty) 
{
	switch($ty)
	{
		Case "go";
			 echo("<script language=\"javascript\"> 
			 <!--
			 alert('$msg');
			 location.href='$url';
			 //-->   
			 </script>");
		Break;
		Case "back";
			echo("<script language=\"javascript\"> 
			 <!--
			 alert('$msg');
			 history.back();
			 //-->   
			 </script>");
		Break;
		Case "direct";
			echo("<script language=\"javascript\"> 
			 <!--
			 alert('$msg');
			 location.href='$url';
			 //-->   
			 </script>");
		Break;
		Case "op";
			echo("<script language=\"javascript\"> 
			 <!--
			 alert('$msg');
			 opener.location.href='$url';
			 self.close();
			 //-->   
			 </script>");
		Break;
        Case "top";
			echo("<script language=\"javascript\"> 
			 <!--
			 alert('$msg');
             top.location.href='$url';
			 //-->   
			 </script>");
		Break;
	}
}

/**
 * 경고메시지출력
 */
function echoAlert($str)
{
	echo("<script language=\"javascript\"> 
		 <!--
		 alert('$str');
		 //-->   
		 </script>");
}

/**
 * 페이지 이동
 */
function echoMovePage($url)
{
	$t = urldecode($url);
    
	exit("
        <script language='javascript' type='text/javascript'>
            this.location.replace('{$t}');
        </script>");
}

//############# 에러 메세지 모음 ##################
function error_msg($msg)
{
	switch ($msg)
	{
		case ("QUERY_ERROR"):
		$err_no = mysql_errno();
		$err_msg = mysql_error();         
		$error_msg = "ERROR CODE " . $err_no . " : " . $err_msg;
		$error_msg = addslashes($error_msg);         
		error($error_msg);  
		break;
	}
}

// 한글 한글자(2byte)는 길이 2, 공란.영숫자.특수문자는 길이 1
function cut_str($str, $len, $suffix="")
{
	$s = substr($str, 0, $len);
	$cnt = 0;
	for ($i=0; $i<strlen($s); $i++)
		if (ord($s[$i]) > 127)
			$cnt++;
	$s = substr($s, 0, $len - ($cnt % 2));
	if (strlen($s) >= strlen($str))
		$suffix = "";
	return $s . $suffix;
}
// 마이크로 타임을 얻어 계산 형식으로 만든다
function get_microtime()
{
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
}

// base64 코드 변환 하여 리턴(준 암호화, 참고: 저 수준 암호 임 개발자는 풀수 있음)
function getB64Encode($xargs) 
{
	$tmpB64 = base64_encode($xargs);
	$tmpB64 = str_replace("+", "xq__P", $tmpB64);
	$tmpB64 = str_replace("/", "xq__S", $tmpB64);
	return $tmpB64;
}

// base64 코드 복호화
function getB64Decode2($arg) 
{
	$xarg = str_replace("xq__P", "+", $arg);
	$xarg = str_replace("xq__S", "/", $xarg);
	$xarg = base64_decode($xarg);
	return $xarg;
}
?>