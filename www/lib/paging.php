<?php
	$first_page_num = (floor ( ($cur_page - 1) / 10 )) * 10 + 1; // 1,11,21,31...
	$last_page_num = $first_page_num + 9; // 10,20,30...last
	$next_page_num = $last_page_num + 1;
	$prev_page_num = $first_page_num - 10;

	if ($first_page_num != 1) { // It's not first page
		echo " <a href='?cur_page=$prev_page_num' class='arr prev'><i>이전</i></a> ";
	}

	for($i = $first_page_num; $i <= $total_page && $i <= $last_page_num; $i ++) {
		if ($cur_page == $i) {
			echo "<a href='?cur_page=$i' class='active'>$i</a>"; // Current page
		} else {
			echo "<a href='?cur_page=$i'>$i</a>";
		}
		if ($i % 10 == 0 && $last_page_num != $total_page) {
			echo "<a href='?cur_page=$next_page_num' class='arr next'><i>다음</i></a>";
		}
	}
?>