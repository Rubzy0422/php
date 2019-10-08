<?php
	function ft_is_sort($arr)
	{
		$a = $arr;
		$b = $arr;
		sort($b);
		return ($a == $b);
	}
?>