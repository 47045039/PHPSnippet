<?php
error_reporting ( E_ALL );

if (FALSE) {
	function testLocal() {
		$a = "abcdefgh"; // 局部变量
		print_r ( $a ); // abcdefgh
	}
	
	testLocal ();
}

if (FALSE) {
	$a = "abcdefgh";
	function testGlobal() {
		global $a; // 全局变量
		print_r ( $a ); // abcdefgh
	}
	
	testGlobal ();
}

if (FALSE) {
	$a = 1; // 相当于$GLOBALS["a"] = 1
	$b = 2; // 相当于$GLOBALS["b"] = 2
	function testSuperGlobal() {
		$GLOBALS ["b"] = $GLOBALS ["a"] + $GLOBALS ["b"]; // $GLOBALS是超全局变量
	}
	
	testSuperGlobal ();
	print_r ( $b ); // 3
	
	print $_SERVER ['HOME']; // /home/mts, 超全局变量：$_SERVER, $_GET, $_POST, $_FILE, $_COOKIE, $_SESSION, $_ENV, $_REQUEST等
}

if (FALSE) {
	function testStatic() {
		static $count = 0;
		
		$count ++;
		echo $count;
		if ($count < 10) {
			testStatic ();
		}
		$count --;
	}
	
	testStatic ();
}

if (FALSE) {
	
	function &get_instance_ref() {
		static $obj;
		
		echo "Static object: ";
		var_dump ( $obj );
		if (! isset ( $obj )) {
			// 将一个引用赋值给静态变量
			$obj = &new stdclass ();
		}

		//$obj->property ++;
		return $obj;
	}

	function &get_instance_noref() {
		static $obj;
		
		echo "Static object: ";
		var_dump ( $obj );
		if (! isset ( $obj )) {
			// 将一个对象赋值给静态变量
			$obj = new stdclass ();
		}
		
		//$obj->property ++;
		return $obj;
	}
	
	$obj1 = get_instance_ref ();
	$still_obj1 = get_instance_ref ();
	echo "\n";
	
	$obj2 = get_instance_noref ();
	$still_obj2 = get_instance_noref ();
}

if (FALSE) {
// 	__LINE__
// 	文件中的当前行号。
// 	__FILE__
// 	文件的完整路径和文件名。
// 	__FUNCTION__
// 	函数名称（这是 PHP 4.3.0 新加的）。
// 	__CLASS__
// 	类的名称（这是 PHP 4.3.0 新加的）。
// 	__METHOD__
// 	类的方法名（这是 PHP 5.0.0 新加的）。
	
	class TTT {
		function Test() {
			print_r(__FILE__);		// /home/mts/work2/workspace-php/PHPSnippet/variable.php
			print_r(__CLASS__);		// TTT
			print_r(__FUNCTION__);	// Test
			print_r(__METHOD__);	// TTT::Test
			print_r(__LINE__);		// 107
		}
	}
	
	$obj = new TTT();
	$obj->Test();
}

if (TRUE) {

// 	常量前面没有美元符号（$）；
// 	常量只能用 define() 函数定义，而不能通过赋值语句；
// 	常量可以不用理会变量范围的规则而在任何地方定义和访问；
// 	常量一旦定义就不能被重新定义或者取消定义；
// 	常量只能包含标量数据（boolean，integer，float 和 string）。

	$name = "CONSTANT";
	if (!defined($name)) {			// 通过名字判断是否已经定义一个常量
		define($name, "It's a constant", true);	// 指定常量名，常量值，以及常量名是否忽略大小写
		
		print_r(CONSTANT);			// It's a constant, 直接使用常量名字获取常量值，而不需要在前边加 ($)
		print_r(constant($name));	// It's a constant， constant()方法通过名字获取常量值
		
		print_r(ConStant);			// It's a constant, 定义常量时常量名大小写不敏感。
		
		define("ConStant", "It's a constant, too", false);	// 指定常量名，常量值，以及常量名是否忽略大小写
		
		print_r(ConStant);			// It's a constant, too, 定义常量时常量名大小写敏感。
		print_r(Constant);			// It's a constant
	} else {
		print_r(CONSTANT);
		print_r(constant($name));
	}
	
	//print_r(get_defined_constants());	// 所有的已经定义的常量
}

?>