<?php
//echo "Hiii";
//Below is about class
class car
{
	//Below are class's attributes.
	//public $brand_one, $car_name_one;
	protected $brand_two, $car_name_two;
	//private $default_brand_name = "volksvegan";
	//private $default_car_name = "polo";
	
	//public function __construct($brand_one, $car_name_one, $brand_two, $car_name_two)
	//{
		//$this->setCarBrandWithName($brand_one, $car_name_one, $brand_two, $car_name_two);
	//}
	//Below are class's methos.
	public function setCarBrandWithName($brand_one, $car_name_one, $brand_two, $car_name_two)
	{
		$this->brand_one = $brand_one;
		$this->car_name_one = $car_name_one;
		$this->brand_two = $brand_two;
		$this->car_name_two = $car_name_two;
		
	}
	
	public function printCarBrandWithName()
	{
		//echo $this->brand_one . " : " . $this->car_name_one . "<br />" . $this->brand_two . " : " . $this->car_name_two;
		echo $this->brand_two . " : " . $this->car_name_two;
	}
}

class cardetails extends car
{
	private $suv;
	
	public function setCarDetails($brand_two, $car_name_two, $suv)
	{
		$this->brand_two = $brand_two;
		$this->car_name_two = $car_name_two;
		$this->suv = $suv;
	}
}

//Below is about objects
$objOne = new car();
//$objOne->setCarBrandWithName("honda","city","nissan","micra");

//Set constructor
//$objOne = new car("honda","city","nissan","micra");
//$objOne->printCarBrandWithName();

//Belolw is about Access specifiers
$cd = new cardetails();
//$cd->setCarDetails("ford","figo","no");
//$cd->printCarBrandWithName();
//$cd->name;

//Below is explained about instanceOf Operator

if($cd instanceof $objOne)
{
	echo "true";
}
else
{
	echo "false";
}

?>
