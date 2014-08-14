<?php
if (false) { // 位运算符，^按位异或
	$a = 12 ^ 9; // Outputs '5'
	
	$b = "12" ^ "9"; // ('1' (ascii 49)) ^ ('9' (ascii 57)) = (ascii 57)
	
	$c = "hallo" ^ "hello"; // 'a' ^ 'e' = (ascii 4)
	                        
	// array(3) {
	                        // [0] => int(5)
	                        // [1] => string(1) "\b"
	                        // [2] => string(5) "
	                        // }
	var_dump ( array (
			$a,
			$b,
			$c 
	) );
}

if (true) {
	// error_reporting(E_ALL);
	function test() {
		/*
		 * @ 错误跟踪符号，可以启动错误跟踪。 `` （反引号）执行运算符，可以执行shell命令 . 字符串连接符，类似append功能
		 */
		global $php_errormsg;
		@file ( 'non_existent_file' );
		echo $php_errormsg; // 无法打印出error信息，why？
		
		echo $abc;
		print_r ( "打印变量失败： {$php_errormsg}" ); // 无法打印出error信息，why？
		
		$output = `ls -al`;
		echo "<pre>$output</pre>"; // 执行shell命令，safe mode时无效。如何关闭或者打开safe mode？
		
		$a = "Hello ";
		$b = $a . "World!"; // $b = "Hello World!"
		print $b;
		
		$a = "Hello ";
		$a .= "World!"; // $a = "Hello World!"
		print $a;
		
		$a = array (
				"a" => "apple",
				"b" => "banana" 
		);
		$b = array (
				"a" => "pear",
				"b" => "strawberry",
				"c" => "cherry" 
		);
		$c = $a + $b; // array1 + array2, array2的数据附加到array1上，但是同名的键值不会覆盖。
		              
		// array(3) {
		              // ["a"]=>
		              // string(5) "apple"
		              // ["b"]=>
		              // string(6) "banana"
		              // ["c"]=>
		              // string(6) "cherry"
		              // }
		var_dump ( $c );
	}
	
	@test (); // 方法调用前加@可以启动error trace。前提是php.ini中track_errors = On
}
?>