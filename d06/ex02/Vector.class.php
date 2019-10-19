<?php

	class Vector
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 0;
		static $verbose = false;

		public function __construct($array)
		{
			if (isset($array['dest']) && $array['dest'] instanceof Vertex) {
				if (isset($array['orig']) && $array['orig'] instanceof Vertex) {
					$orig = new Vertex(array('x' => $array['orig']->get_x(), 'y' => $array['orig']->get_y(), 'z' => $array['orig']->get_z()));
				} else {
					$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
				}
				$this->_x = $array['dest']->get_x() - $orig->get_x();
				$this->_y = $array['dest']->get_y() - $orig->get_y();
				$this->_z = $array['dest']->get_z() - $orig->get_z();
				$this->_w = 0;
			}
			if (Self::$verbose)
				printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}

		public function magnitude()
		{
			return (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
		}

		public function normalize()
		{
			$longeur = $this->magnitude();
			if ($longeur == 1) {
				return clone $this;
			}
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $longeur, 'y' => $this->_y / $longeur, 'z' => $this->_z / $longeur))));
		}

		public function add(Vector $rhs)
		{
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z))));
		}
		
		public function sub(Vector $rhs)
		{
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z))));
		}

		public function opposite()
		{
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
		}

		public function scalarProduct($k)
		{
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
		}

		public function dotProduct(Vector $rhs)
		{
			return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
		}

		public function crossProduct(Vector $rhs)
		{
			return new Vector(array('dest' => new Vertex(array(
				'x' => $this->_y * $rhs->get_z() - $this->_z * $rhs->get_y(),
				'y' => $this->_z * $rhs->get_x() - $this->_x * $rhs->get_z(),
				'z' => $this->_x * $rhs->get_y() - $this->_y * $rhs->get_x()
			))));
		}

		public function cos(Vector $rhs)
		{
			return ((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
		}

		function __destruct()
		{
			if (Self::$verbose)
				printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}

		function __toString()
		{
			return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
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

		public static function doc()
		{
			$read = file_get_contents("Vector.doc.txt");
			echo "\n" .$read . "\n";
		}
	}