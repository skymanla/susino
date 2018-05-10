<?
	//파일업로드 함수
	$max_size = 1024*20*1000;
	$uploadOk = 1;
	$file1 = $_FILES["file1"]["name"];//file1에 있는 파일 이름!
	if($file1 != NULL)
	{
		$new_file1 = "";
		$regfile = $flag.Date("ymdHis");//$flag에 Date("ymdHis")를 붙여줌..
		$uploadOk = 1;
		$file_ext = explode(".", $file1);//.을 배열로 만들어줌..
		$target_dir = "../data/".$flag."/"; // flag는 테이블명마다 지정됨

		$board_file_savedir = $target_dir;
		if(!is_dir($board_file_savedir))
		{
			mkdir($board_file_savedir, 0755);
		}

		$origin_name = $file_ext[0]; //확장자를 제외한 파일 이름
		$ext_name = strtolower($file_ext[1]); //확장자  strtolower() = 소문자 변환 함수
		// Check file size
		if ($_FILES["file1"]["size"] > $max_size) {
			$uploadOk = 0;	
			echo "<meta charset='UTF-8'><script>alert('파일의 용량이 20mb를 초과하였습니다.'); history.go(-1);</script>";
		}
		else if($ext_name == NULL)
		{
			$uploadOk = 0;
			echo "<meta charset='UTF-8'><script>alert('파일을 업로드하지 않았습니다.'); history.go(-1);</script>";
		}
		else if($ext_name != "jpg" && $ext_name != "jpeg" && $ext_name !="gif" && $ext_name !="png")
		{
			$uploadOk = 0;
			echo "<meta charset='UTF-8'><script>alert('업로드 제한 확장자입니다.'); history.go(-1);</script>";
		}
	
		$target_file = $target_dir . $regfile.".".$ext_name;

		if($file1 != NULL){
			$new_file1 = $regfile. ".".$ext_name;
		}

		$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
		////파일 업로드 조건 완료
		//모든 조건을 다 통과했다면
		if ($uploadOk != 0) {
			move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file);
		}
	}
?>