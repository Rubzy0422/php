<?php

	class UnholyFactory
	{
		private $army = array();

		public function absorb($member)
		{
			if (get_parent_class($member)) {
				if (isset($this->army[$member->getName()])) {
					print("(Factory already absorbed a fighter of type " . $member->getName() . ")" . "\n");
				} else {
					print("(Factory absorbed a fighter of type " . $member->getName() . ")" . "\n");
					$this->army[$member->getName()] = $member;
				}
			} else {
				print("(Factory can't absorb this, it's not a fighter)" . "\n");
			}
		}

		public function fabricate($member)
		{
			if (array_key_exists($member, $this->army)) {
				print("(Factory fabricates a fighter of type " . $member . ")" . "\n");
				return (clone $this->army[$member]);
			}
			print("(Factory hasn't absorbed any fighter of type " . $member . ")" . "\n");
			return null;
		}
	}