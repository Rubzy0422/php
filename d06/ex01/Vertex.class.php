<?php

	class Vertex
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 1;
		private $_color;
		static $verbose = false;

		public function __construct($args)
		{
			$this->_x = $args['x'];
			$this->_y = $args['y'];
			$this->_z = $args['z'];
			if (isset($args['w']) && !empty($args['w']))
				$this->_w = $args['w'];
			if (isset($args['color']) && !empty($args['color']) && $args['color'] instanceof Color) {
				$this->_color = $args['color'];
			} else {
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
			}
			if (Self::$verbose)
				printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}

		function __destruct()
		{
			if (Self::$verbose)
				printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}

		function __toString()
		{
			if (Self::$verbose)
				return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
			return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
		}

		public function get_x()
		{
			return $this->_x;
		}
		
		public function get_y()
		{
			return $this->_y;
		}

		public function get_z()
		{
			return $this->_z;
		}

		public function get_w()    
		{
			return $this->_w;
		}

		public function get_Color()
		{
			return $this->_color;
		}
		
		public function set_x($x)
		{
			$this->_x = $x;
		}

		public function set_y($y)
		{
			$this->_y = $y;
		}

		public function set_z($z)
		{
			$this->_z = $z;
		}

		public function set_w($w)
		{
			$this->_w = $w;
		}

		public function set_Color($color)
		{
			$this->_color = $color;
		}

		public static function doc()
		{
			$read = file_get_contents("Vertex.doc.txt");
			echo "\n" . $read . "\n";
		}
	}