<?php //oopsConcept.php

class Customer {
	
	private $first_name, $last_name;
	
	public function setdata($first_name, $last_name) {
		$this->first_name = $first_name;
		$this->last_name = $last_name;
	}
	
	public function printData() {
		echo $this->first_name . ' : ' . $this->last_name;
	}
	
}

$setData = new Customer();
$setData->setData('Brijesh','Khatri');

?>