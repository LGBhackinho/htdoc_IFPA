

<?php
    
    class Person {
        private string $Nom;
        private string $Prenom;
        private int $age;
        
         // Constructors
        public function __construct($Nom = "", $Prenom = "", $age = 0)  {
            
            $this->Nom = $Nom;
            $this->Prenom = $Prenom;
            $this->age = $age;
        
        }
        Public function affichePerson(){        //Ecrire void si on veut qu elle retourne rien 
            echo "$this->Nom $this->Prenom $this->age"."\n<br>";
            
            
        }
    }

    class Entreprise {
        private string $Nom;
        private array $Employes;
        
        // Constructors
        public function __construct($Nom = "") {
            $this->Nom = $Nom;
            $this->Employes =[];
        }
        public function _getname():string{
            return $this->Nom;
        }
        Public function AjouterEmploye(person $person): void {     
            
            array_push($this->Employes,$person);    // on peut aussi l ecrire $this->Employes[]=$person   PERMETTANT D AJOUTER DASN UN TABLEAU
        }

        Public function AfficherEmploye(): void { 
            foreach ($this->Employes as $person) {
                $person->affichePerson();
            
            }
        
         }
    }
$employe1= new person("didier","martin",78);
$employe2= new person("ruddy","MARIA",49);

$entreprise= new Entreprise("IFPA");
$entreprise->AjouterEmploye($employe1);
$entreprise->AjouterEmploye($employe2);

echo $entreprise->_getname()."\n<br>";
$entreprise->AfficherEmploye();

?>





    <?php





////// CORECTION DE  EXERCICE

// class Person {
//     // Attributes
//     public string $firstName;
//     public $lastName;
//     public $age;

//     // Methods
//     public function printAttributes() : void {
//         echo $this->firstName . " " . $this->lastName . " " . $this->age . " years old\n";
//     }

//     // Constructors
//     public function __construct($firstName = "", $lastName = "", $age = 0) {
//         $this->firstName = $firstName;
//         $this->lastName = $lastName;
//         $this->age = $age;
//     }
// }

// // Usage
// $person1 = new Person();
// $person1->firstName = "John";
// $person1->lastName = "Doe";
// $person1->age = 30;
// $person1->printAttributes();

// $person2 = new Person("Jane", "Doe", 25);
// $person2->printAttributes();

?>


<!-- VERSION SECURISER POUR NE PAS ACCEDER A LA MEOIRE DES VARIABLES -->


<?php

    // class Person {
    //     // Attributes
    //     private string $firstName;
    //     private string $lastName;
    //     private int $age;

    //     // Methods
    //     public function printAttributes() : void {
    //         echo $this->firstName . " " . $this->lastName . " " . $this->age . " years old\n";
    //     }

    //     public function setFirstName(string $firstName) : void {
    //         $this->firstName = $firstName;
    //     }

    //     public function setLastName(string $lastName) : void {
    //         $this->lastName = $lastName;
    //     }

    //     public function setAge(int $age) : void {
    //         $this->age = $age;
    //     }

    //     public function getFirstName() : string {
    //         return $this->firstName;
    //     }

    //     public function getLastName() : string {
    //         return $this->lastName;
    //     }

    //     public function getAge() : int {
    //         return $this->age;
    //     }

    //     // Constructors
    //     public function __construct($firstName = "", $lastName = "", $age = 0) {
    //         $this->firstName = $firstName;
    //         $this->lastName = $lastName;
    //         $this->age = $age;
    //     }
    // }

    // // Usage
    // $person1 = new Person();
    // $person1->setFirstName("John");
    // $person1->setLastName("Doe");
    // $person1->setAge(30);
    // $person1->printAttributes();

    // $person2 = new Person("Jane", "Doe", 25);
    // $person2->printAttributes();

    // $age = $person2->getAge();
    // echo $age;
?>


