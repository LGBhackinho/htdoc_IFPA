
<?php

    enum sexe : string {
        case femme = "F";
        case homme = "H";

    }
//DEFINITION DE MA CLASS HUMAIN

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
                echo "Connaissance : ".implode(" , ",$this->skills);
                echo "<br>";
                // echo $this->prenom." fete son anniversaire et a maintenant ".$this->age." ans";
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
            echo "il sait maintenant ". $this->getSkills()."<br>";
        }
        public function printBirth() {
            if (($this->age < 18 ) || ($this->age > 18 )){
                echo $this->prenom." fete son anniversaire et a maintenant ".$this->age++." ans <br> ";
                echo "<br>";
            }
            else{
                echo $this->prenom." fete son anniversaire et a maintenant ".$this->age++." ans et il est majeur <br> ";
                echo "<br>";
            }
        }
        
        public function search_skill($search_skill){
            return array_search($search_skill,$this->skills);
        }
    }

    //TRAITEMENT APRES LA CLASS
    session_start();
    if (isset($_GET["step"]) && ($_GET["step"]=="0")){       // VERIFICATION SI LE CHAMPS EST NULL ET QUE LE CHAMPS EST A 0 permet d initialliser par l URL avec ?step=0
        unset($_SESSION["humain"]);                          //  ALORS j INITIALISE MA SESSION
        header('Location: http://localhost/ExercicePOO_annexe_SESSION.php');   //redirection d une autre page 
    }

    if (isset($_SESSION["humain"])){       // VERIFICATION SI LA SESSION A EU UN OBJET DE RENSEIGNE AU COUP D AVANT
        $humain1=$_SESSION["humain"];       // JE MET A JOUR MA VARIABLE D OBJET  ET C EST UNE COPIE DONC FONCTIONNE DASN LES DEUX SENS

        // GENERATION ALEATOIRE D EVENEMENT DE COMPETENCE
        
        if ($humain1->getAge()>=rand($humain1->getAge(),4)  ) {
            if ($humain1->search_skill("savoir marcher")===FALSE){
                $humain1->addSkill("savoir marcher");
                
            }
            
        }
       

        if ( ($humain1->getAge()>=rand($humain1->getAge(),8)) && ($humain1->search_skill("savoir marcher")!==False)) {
            if ($humain1->search_skill("faire ces lacets")===FALSE){
                $humain1->addSkill("faire ces lacets");
            echo $humain1->search_skill("faire ces lacets");
            
            
        }
        if ( $humain1->getAge()===rand(6,120) ) {
            
        }
    }
    else{
        $humain1=new humain("Toto","TATA");   // COMME PAS DE SESSION ALORS JE CREE UN OBJET
        $_SESSION["humain"]=$humain1; // ET JE MET A JOUR LA SESSION
        $humain1->addSkill("pleurer,chier,pisser");
    }
    $humain1->printBirth();    // AFFICHAGE D ANNIVERSAIRE
    // echo var_export($humain1->search_skill("savoir marcher"),True);
    // echo var_export($humain1,True);
    echo "<br>";
?>
<a href="http://localhost/ExercicePOO_annexe_SESSION.php?step=0">RESET</a>
        
                

                
    


