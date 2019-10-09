#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$html = file_get_contents($argv[1]);
		preg_match_all("<img.+src=\"(.+?)\".+>", $html, $matches);
		$dir = parse_url($argv[1], PHP_URL_HOST);
		if (!file_exists($dir))
			mkdir($dir);

		foreach ($matches[1] as $img_url)
		{
			$url = parse_url($img_url);
			if (sizeof($url) == 1)
				$img = $argv[1] . $url["path"];
			else 
				$img = $img_url;
			$img_arr = explode("/", $img);
			$img_dir = $dir . "/" . end($img_arr);

			file_put_contents($img_dir, file_get_contents($img));
		}
}
?>