<?php

	class NightsWatch implements IFighter
	{
		private $army = array();

		public function recruit($member)
		{
			$this->army[] = $member;
		}

		function fight()
		{
			foreach ($this->$army as $member) {
				if (method_exists(get_class($member), 'fight'))
					$member->fight();
			}
		}
	}