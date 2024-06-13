



<?php

enum sexe : string {
    case femme = "F";
    case homme = "H";

}
    class humain {
        private string $Prenom;
        private string $Nom;
        private string $Sexe; 
        private int $Age = 0;
        private array $skills;

        public function __construct (string $prenom,string $nom,int $age=1){

                $this->age=$age;

                rand(1,2)==1 ? $sexe=sexe::femme : $sexe=sexe::homme; 
                
                $this->sexe=$sexe;

                $this->prenom=$prenom;
                $this->nom=$nom;
                $this->skills[]="respirer,nutrition";

                echo "Prenom : ".$this->prenom;
                echo "<br>";
                echo "Nom : ".$this->nom;
                echo "<br>";
                echo "Sexe : ".$this->sexe->name;
                
                echo "<br>";
                echo "Age : ".$this->age." ans ";
                echo "<br>";
                echo "Connaissance : ".implode(",",$this->skills);
                echo "<br>";
                echo $this->prenom." fete son anniversaire et a maintenant ".$this->age." ans";
                echo "<br>";
                echo "<br>";
            }
        public function setPrenom (string $prenom){
            $this->prenom=$prenom;
            
        }
        public function setNom (string $nom){
            $this->nom=$nom;
            
        }
        public function setAge (int $age){
            $this->age=$age;
            
        }
        public function getAge (){
            return $this->age;
            
        }
        
        public function getPrenom () : string {
            return $this->prenom;
            
        }
        public function getNom (){
           return $this->nom;
            
        }
        public function getSkills () {
            // return $this->skills;
           return implode(",",$this->skills);
             
         }
        public function addSkill(string $skill){
            array_push($this->skills,$skill);
            echo $this->prenom." a appris : ".$skill;
            echo "<br><br>";
        }
        public function printBirth() {
           
            echo $this->prenom." fete son anniversaire et a maintenant ".$this->age++." ans <br> ";
            echo "<br>";

        }
        public function printData(){
                echo "Prenom : ".$this->prenom;
                echo "<br>";
                echo "Nom : ".$this->nom;
                echo "<br>";
                echo "Sexe : ".$this->sexe->name;
                echo "<br>";
                echo "Age : ".$this->age." ans ";
                echo "<br>";
                echo "Connaissance : ".implode(",",$this->skills);
                echo "<br>";
                echo $this->prenom."fete son anniversaire et a maintenant ".$this->age." ans";
                echo "<br>";
                echo "<br>";
        }
    }
    
    $humain1=new humain("Ruddy","Marie");
    $humain1-> setAge(2);
    $humain1->printBirth();
    $humain1->addskill("PHP");
    $humain1->addskill("POO");
  
    $humain1-> setAge(37);
    $humain1->printBirth();
    $humain2=$humain1;
    Echo " Un humain a été crée à partir de ".$humain1->getPrenom()."<br><br>";
    $humain3=clone $humain1;
    Echo " Un humain a été cloné à partir de ".$humain1->getPrenom()."<br><br>";
    $humain1->addskill("clonage d objet ");

    echo $humain2->getPrenom()." connait : ".$humain1->getSkills()."<br><br>";

    $humain2-> setAge(45);
    //$humain2->printBirth();

    // $humain1->printData();
    $humain2->setPrenom("didiercopie");
   
    $humain3->setNom("MartinClone");
    $humain3->printBirth();
    $humain3->printData();
    
?>