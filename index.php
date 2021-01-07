<!DOCTYPE html>
<html>
<head>
	<title>Inheritance in OOP PHP</title>
</head>
<body>
<?php

class ProjectManager{
	private $contractors;
	function __construct()
	{
		$this->contractors = [];
	}
	public function hireContractor($contractor){
		$this->contractors[]=$contractor;
	}
	
	public function buildHouse()
	{
		foreach($this->contractors as $contractor){
			echo "<p>".$contractor->work()."</p>";
		}
	}
	public function payContractors(){
		foreach($this->contractors as $contractor){
			echo "<p>".$contractor->pay()."</p>";
		}
	}
}

Abstract class Contractor{
	private $firstName;
	private $lastName;
	function __construct($firstName,$lastName)
	{
	 	$this->firstName = $firstName;
	 	$this->lastName = $lastName;
	}
	public function getFullName()
	{
		return $this->firstName." ".$this->lastName;
	}
	public function pay(){
		return $this->getFullName()." just got paid.";
	}
	abstract function work();
}

class Builder extends Contractor{
	public function digFoundations()
	{
		return $this->getFullName()." has dug some foundations.";
	}
	public function buildWalls()
	{
		return $this->getFullName()." has built the walls.";
	}
	public function work(){
		return $this->buildWalls()." ".$this->digFoundations();
	}
}

class Joiner extends Contractor{
	public function work()
	{
		return $this->getFullName()." has made some stairs.";
	}
}

class Electrician extends Contractor{
	public function work()
	{
		return $this->getFullName()." has fitted the lights.";
	}
}

class Plumber extends Contractor{
	public function work()
	{
		return $this->getFullName()." has fitted a sink.";
	}
}

$builder = new Builder("Jane","Smith");
$joiner = new Joiner("Imran","Iqbal");
$electrician = new Electrician("Carla","Green");
$plumber = new Plumber("Clinton","Woods");
$projectManager = new ProjectManager();
$projectManager->hireContractor($builder);
$projectManager->hireContractor($joiner);
$projectManager->hireContractor($electrician);
$projectManager->hireContractor($plumber);
$projectManager->buildHouse();
$projectManager->payContractors();

?>
</body>
</html>
