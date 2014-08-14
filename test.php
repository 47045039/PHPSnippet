<?php

error_reporting ( E_ALL );

if (FALSE) {
	echo 'this is a simple string';
	
	echo 'You can also have embedded newlines in
strings this way as it is
okay to do';
	
	// Outputs: Arnold once said: "I'll be back"
	echo "Arnold once said: 'I\'ll be back' \r\n";
	
	// Outputs: You deleted C:\*.*?
	echo 'You deleted C:\\*.*? \r\n';
	
	// Outputs: You deleted C:\*.*?
	echo 'You deleted C:\*.*? \r\n';
	
	// Outputs: This will not expand: \n a newline
	echo 'This will not expand: \n a newline \r\n';
	
	// Outputs: Variables do not $expand $either
	echo 'Variables do not $expand $either \r\n';
}

if (FALSE) {
	$str = <<<EOD
Example of string spanning multiple lines using heredoc syntax.
EOD;
	
	/* More complex example, with variables. */
	class foo {
		var $foo;
		var $bar;
		function foo() {
			$this->foo = 'Foo';
			$this->bar = array (
					'Bar1',
					'Bar2',
					'Bar3' 
			);
		}
	}
	
	$foo = new foo ();
	$name = 'MyName';
	
	echo <<<EOT
My name is "{$name}". I am printing some {$foo->foo}.
Now, I am printing some {$foo->bar[1]}.
This should print a capital 'A': \x41
EOT;
}

if (FALSE) {
	$fruits = array (
			'strawberry' => 'red',
			'banana' => 'yellow' 
	);
	echo "A banana is {$fruits["banana"]}.";
	
	$str = "this is a string";
	$first = $str {0};
	echo "first char is {$first}";
	echo "first char is {$str{0}}";
}

if (FALSE) {
	$arr = array( 'a' => 1, 'b'=>2, 3=>'c' );
	$arr[] = 'd';
	echo $arr['a'];
	echo $arr[3];
	echo $arr[4];
	
	unset($arr['a']);
	echo $arr['a'];
	echo $arr[3];
	echo $arr[4];
	
	unset($arr);
	echo $arr['a'];
	echo $arr[3];
	print_r($arr);
}

if (FALSE) {
	$arr = array(1,2,3,4,5);
	print_r($arr);	//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 ) 
	
	foreach ($arr as $idx => $val) {
		unset($arr[$idx]);
	}
	print_r($arr);	//Array ( ) 
	
	$arr[] = 6;
	print_r($arr);	//Array ( [5] => 6 )
	
	print_r(array_keys($arr));	//Array ( [0] => 5 )
	
	$arr = array_values($arr);
	print_r($arr);	//Array ( [0] => 6 ) 
	
	$arr[] = 7;
	print_r($arr);	//Array ( [0] => 6 [1] => 7 )
}

if (FALSE) {
	function my_callback($str) {
		print_r($str);
	}
	
	call_user_func('my_callback', '12345');	//12345
	
	class Test {
		function my_callback($str) {
			print_r($str);
		}
	}
	
	call_user_func(array('Test', 'my_callback'), 'abcd');	//abcd
	
	$obj = new Test();
	call_user_func(array(&$obj, 'my_callback'), 'efg');	//efg
}

if (TRUE) {
	$a = 'abc';
	$a[0] = '0';
	print_r($a);	//0bc
	
	$a{1} = 'f';
	print_r($a);	//0fc
	
	$var = 'abcd';
	echo "hello, {$var{0}}";
	echo "hello, {$var[0]}";
	
	$foo = 'foo';
	$bar = &$foo;
	echo $foo, ',', $bar;	//foo,foo
	
	$bar = 'bar';
	echo $foo, ',', $bar;	//bar,bar
	
}
?>
