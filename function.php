<?php
if (false) {
	
	error_reporting ( E_ALL );
	function foo() {
		function bar() {
			echo "function bar()";
		}
	}
	
	// bar(); // crash, bar()方法未定义
	
	foo (); // 调用foo()时，创建了bar()方法
	
	bar (); // function bar()
}

if (false) {
	// array作为参数
	function takes_array($input) {
		echo "$input[0] + $input[1] = ", $input [0] + $input [1]; // 1 + 2 = 3
	}
	
	takes_array ( array (
			1,
			2 
	) );
	
	// 对象引用做参数
	function add_some_extra(&$string) {
		$string .= 'and something extra.';
		echo $string; // This is a string, and something extra. 改变引用的值，也就改变了原始对象的值
	}
	function add_some_extra2($string) {
		$string .= 'and something extra.';
		echo $string; // This is a string, and something extra.and something extra. 改变了函数参数的值，原始对象并未改变
	}
	$str = 'This is a string, ';
	add_some_extra ( $str );
	echo $str; // This is a string, and something extra.
	
	$str2 = 'This is a string, ';
	add_some_extra2 ( $str2 );
	echo $str2; // This is a string,
	            
	// 默认参数，注意：使用默认参数时，任何默认参数必须放在任何非默认参数的右侧
	function makecoffee($type1, $type2 = "cappuccino") {
		return "Making a cup of $type1.\n";
	}
	echo makecoffee (); // Making a cup of cappuccino.
	echo makecoffee ( "espresso" ); // Making a cup of espresso.
}

if (false) {
	// func_num_args() 获取函数参数个数
	// func_get_args() 获取函数所有参数
	// func_get_arg () 获取函数的某一个参数，索引从0开始
	function foo() {
		$numargs = func_num_args (); // 3
		echo "Number of arguments: $numargs<br />\n";
		if ($numargs >= 2) {
			echo "Second argument is: " . func_get_arg ( 1 ) . "<br />\n"; // 2
		}
		$arg_list = func_get_args ();
		for($i = 0; $i < $numargs; $i ++) {
			echo "Argument $i is: " . $arg_list [$i] . "<br />\n"; // 1, 2, 3
		}
	}
	
	foo ( 1, 2, 3 );
}

if (false) {
	function foo() {
		echo "In foo()<br>\n";
	}
	function bar($arg = '') {
		echo "In bar(); argument was '$arg'.<br>\n";
	}
	function echoit($string) {
		echo $string;
	}
	
	$func = 'foo';
	$func (); // 变量函数，实际调用foo()
	
	$func = 'bar';
	$func ( 'test' ); // 变量函数，实际调用bar()
	
	$func = 'echoit';
	$func ( 'test' ); // 变量函数，实际调用echoit()
	class Foo {
		function Varr() {
			echo "This is " . __FUNCTION__; // This is Varr
			$name = 'Bar';
			$this->$name (); // 调用Bar()
		}
		function Bar() {
			echo "This is " . __METHOD__; // This is Foo::Bar
		}
	}
	
	$foo = new Foo ();
	$funcname = "Varr";
	$foo->$funcname (); // 调用Varr()，然后调用Bar()
}

if (true) {
	function test() {
	}
	function test1() {
	}
	echo function_exists ( 'test' );
	
	// array(2) {
	// ["internal"]=>array(1765) {...}
	// ["internal"]=>array(2) {[0] => string(4) "test", [1] => string(5) "test1"}
	// }
	
	var_dump ( get_defined_functions () );
	
	// array(24) {
	// [0] => string(17) "xml_parser_create"
	// [1] => string(20)
	// ....
	// }
	var_dump ( get_extension_funcs ( 'xml' ) );
}

?>