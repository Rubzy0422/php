<?php

	class Color
	{
		public $red;
		public $green;
		public $blue;
		static $verbose = false;

		public function __construct($color_arr)
		{
			if (isset($color_arr['red']) && isset($color_arr['green']) && isset($color_arr['blue'])) {
				$this->red = intval($color_arr['red']);
				$this->green = intval($color_arr['green']);
				$this->blue = intval($color_arr['blue']);
			} else if (isset($color_arr['rgb'])) {
				$hex_color = intval($color_arr["rgb"]);
				$this->red = ($hex_color >> 16) & 255;
				$this->green = ($hex_color >> 8) & 255;
				$this->blue = $hex_color & 255;
			}
			if (Self::$verbose)
				printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		}

		function __destruct()
		{
			if (Self::$verbose)
				printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		}

		public function add($Color)
		{
			return (new Color(array('red' => $this->red + $Color->red, 'green' => $this->green + $Color->green, 'blue' => $this->blue + $Color->blue)));
		}

		public function sub($Color)
		{
			return (new Color(array('red' => $this->red - $Color->red, 'green' => $this->green - $Color->green, 'blue' => $this->blue - $Color->blue)));
		}

		public function mult($mult)
		{
			return (new Color(array('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult)));
		}

		function __toString()
		{
			return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
		}

		public static function doc()
		{
			$read = file_get_contents("Color.doc.txt");
			echo "\n" . $read . "\n";
		}

	}