<?php

/**
 * @author  http://www.weibo.com/p0k1n9
 * @author  tianming@bxbsec.com <[email address]>
 * @string strint() $str
 * if $str == int  intval($str)
 * if $str == string htmlspecialchars($str) OR strval($str)
 */

function Prevent_SQL_Injection($str){// $arr你认为缺什么加什么
	$arr = array("and",
				 "order",
				 "or",
				 "'",
				 rawurlencode(mb_convert_encoding("&&", "utf-8", "gb2312")),
				 rawurlencode(mb_convert_encoding("||", "utf-8", "gb2312")),
				 rawurlencode(mb_convert_encoding("'", "utf-8", "gb2312")),
				 );
	// var_dump($arr);
	
	foreach ($arr as $k => $v) {
		if(count(explode($v,$str)) > 1){
			echo "<script>alert('去你妈的SQL注入')</script>";
			die("骚年，在我这里SQL注入你还得再玩几年！");
		}else{
			return $str;
		}
	}
}

$str = $_GET['s'] ? $_GET['s'] : 111; //code
$str = Prevent_SQL_Injection($str);
echo $str;













?>