#!/usr/bin/php
<?php

?>


<html>
	<head><title>Nice page</title></head>
<body>
	Hello World
	<a href=http://cyan.com title="a link">This is a link</a><br />
	<a href=http://www.riven.com> And this too <img src=wrong.image title="And also this"></a>
</body>
</html>


$> ./loupe.phppage.html > new_page.html

$> cat new_page.html

<html>
	<head><title>Nice page</title></head>
<body>
	Hello World
	<a href=http://cyan.com title="A LINK">THIS IS A LINK</a><br />
	<a href=http://www.riven.com> AND THIS TOO <img src=wrong.image title="AND ALSO THIS"></a>
</body>
</html>