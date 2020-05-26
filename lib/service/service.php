<?php  

/**
 * service library
 */

function pointAlpha($float){
	if($float <= 10.0 && $float >= 8.5){
		return 'A(Giỏi)';
	}else if($float < 8.5 && $float >= 8.0){
		return 'B+(Khá giỏi)';
	}else if($float < 8.0 && $float >= 7.0){
		return 'B(Khá)';
	}else if($float < 7.0 && $float >= 6.5){
		return 'C+(Trung bình khá)';
	}else if($float < 6.5 && $float >= 5.5){
		return 'C(Trung bình)';
	}else if($float < 5.5 && $float >= 5.0){
		return 'D+(Trung bình yếu)';
	}else if($float < 5.0 && $float >= 4.0){
		return 'D(Yếu)';
	}else if($float < 4.0 && $float >= 0.0){
		return 'F(Kém)';
	}else{
		return 'underfine!';
	}
}
?>