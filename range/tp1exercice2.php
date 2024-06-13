<?php
    // Parent class
class Vehicule {
    protected string $brand;
    protected string $model;
    protected int $year;

    public function __construct(string $brand,string $model,int $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getBrand() : string {
        return $this->brand;
    }
    public function getModel() :string {
        return $this->model;
    }
    public function getYear() :int {
        return $this->year;
    }
    public function drive() :void {
        echo "Fonction de drive";
    }
}

// Child class inheriting from Animal
class Car extends Vehicule {
    private string $color;

    public function __construct(string $brand, string $model, int $year,string $color) {
        parent::__construct($brand,$model,$year);
        $this->color = $color;
    }

    public function getColor() : string{
        return $this->color;
    }

    public function honk() :void {
                echo "Fonction de honk";
    }
}

class CarDealer  {
    private array $cars;
    public function __construct() {
                $this->cars = [];
    }

    
    public function addCar(Car $car) : void{
                array_push($this->cars, $car);
    }

    public function getCars() :array {
                return $this->car;
    }
}


$car1= new Car("Renaut","clio",2005,"blue");
 $car2= new Car("Citroen","clio",2021,"Red");
$car3= new Car("BMW","serie 1",1989,"Yellow");
$car4= new Car("AUDI","A3",2000,"Purple");

$car_dealer= new CarDealer();
$car_dealer-> addCar($car1);
$car_dealer-> addCar($car2);
$car_dealer-> addCar($car3);
$car_dealer-> addCar($car4);



echo "Affiche moi la couleur du vehicule ".$car1->getbrand()." ".$car1->getmodel()." :";
echo "<br>";
echo " La couleur ".$car1->getcolor();



?>