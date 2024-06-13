<?php
    class Guilde{
        private string $nom;
        private array $joueurs;

        public function __construct() {
            $this->joueurs = [];
        }

        
        public function addJoueur(Joueur $joueur) : void{
            array_push($this->joueurs, $joueur);
        }
        

        function printNomJoueur() : void{

            foreach ($this->joueurs as $joueur) {
                echo $joueur->getName()."<br>";

            }
        }
        public function PrintNbreJoueur() : void{
           
            echo "Le nombre de joueur est de : ".count($this->joueurs);
        }
    }

    class Joueur{
        protected string $name;
        protected int $pv;
       
        function __construct(string $name, int $pv){
            $this->name = $name;
            $this->pv =$pv;
           }

       function getName() : string {
            return $this->name;
        }
     }

    class Guerrier extends Joueur implements Forger{
        private string $rage;
        private static $RAGE_MIN=0;
        private static $RAGE_MAX;

        public function __construct(string $name, int $pv,int $rage=0,int $RAGE_MIN=0,int $RAGE_MAX=0) {
            parent::__construct($name,$pv);
            $this->rage = $rage;
            self::$RAGE_MIN;
            self::$RAGE_MAX;
        }

        function coupEpee():void {
           echo "<br>";
           echo "JE met un coup D EPEE";
        }

        final function SortUltime() : void{
            echo "<br>";
            echo "Je jet mon sort ULTIME !!!!!!!! ";
            echo "<br>";
        }

        function SET_RAGE_MAX($RAGE_MAX):int {
            return $this->RAGE_MAX=$RAGE_MAX;
        }
        function setRage($rage):int {
            return $this->rage=$rage;
        }

        function checkRage() : void{
           
        }

        // Implémentation des méthodes de l'interface
        public function savoirForger() {
        echo "je sais Forger";

        }
   }

   class Mage extends Joueur implements Tisser{
    private int $mana;
    private static $MANA_MIN=0;
    private static $MANA_MAX;

    public function __construct(string $name, int $pv) {
        parent::__construct($name,$pv);
        self::$MANA_MIN;
        
        if (isset(self::$MANA_MAX)){
            $this->mana = self::$MANA_MAX;;
            
        }
        else{
            self::checkMana();
        }
        
    }

    function bouleDeFeu():void {
       echo "<br>";
       echo "JE lance une boule de FEUUUU ";
       self::checkMana();
    }

    final function SortUltime() : void{
        echo "<br>";
        echo "Je jet mon sort ULTIME !!!!!!!! ";
        echo "<br>";
    }

     static function SET_MANA_MAX($MANA_MAX):void {
        self::$MANA_MAX=$MANA_MAX;
        
    }

    function setMana($mana):void {
         $this->mana=$mana;
    }

    function checkMana() : void{
        
        if (isset($this->mana)) { 
            if ($this->mana!==0){
                $this->mana=$this->mana-1;
                Echo "Mon MANA est à : ".$this->mana."<br>";
                if($this->mana==0){
                    echo "GAME OVER : MANA = ".$this->mana."<br>";   
                }
            }
            elseif ($this->mana==0){
            
                echo "GAME OVER : MANA = ".$this->mana."<br>";
            }
            
        }
        else{
            $this->mana=self::$MANA_MAX;
            
        }
    }
    // Implémentation des méthodes de l'interface
    public function savoirTisser() {
        echo "je sais TISSER";

        }
    }

class Archer extends Joueur implements Taner{
    private string $endurance;
    private static $ENDURANCE_MIN=0;
    private static $ENDURANCE_MAX;

    public function __construct(string $name, int $pv,int $endurance=0,int $ENDURANCE_MIN=0,int $ENDURANCE_MAX=0) {
        parent::__construct($name,$pv);
        $this->endurance = $endurance;
        self::$ENDURANCE_MIN;
        self::$ENDURANCE_MAX;
    }

    function coupEpee():void {
       echo "<br>";
       echo "JE met un coup D EPEE";
    }

    final function SortUltime() : void{
        echo "<br>";
        echo "Je jet mon sort ULTIME !!!!!!!! ";
        echo "<br>";
    }

    function SET_ENDURANCE_MAX($ENDURANCE_MAX):int {
        return $this->ENDURANCE_MAX=$ENDURANCE_MAX;
    }
    function setEndurance($endurance):int {
        return $this->endurance=$endurance;
    }

    function checkEndurance() : void{
        echo "<br>";
        echo "Je verifie son Endurance ";
        echo "<br>";
    }
    // Implémentation des méthodes de l'interface
    public function savoirTaner() {
        echo "je sais Taner";

        }
}
    
    interface Forger { 
        function savoirForger();
    }
    interface Tisser { 
        function savoirTisser();
    }
    interface Taner { 
        function savoirTaner();
    }
    
    Mage::SET_MANA_MAX(4);
    $Guerrier1= new Guerrier ("THOR",50);
    $Guerrier2= new Guerrier ("TITI",45);
    $mage1= new Mage ("MageRuddy",25);
    $archer1= new Archer ("ArcherDidier",85);
    
    $guilde= new Guilde();
    
    
   
    $guilde->addJoueur($Guerrier1);
    $guilde->addJoueur($Guerrier2);
    $guilde->addJoueur($mage1);
    $guilde->addJoueur($archer1);

    $guilde->printNomJoueur();
    $guilde->printNbreJoueur();
    
    

    $mage1->bouleDeFeu();
    $mage1->bouleDeFeu();
    $mage1->bouleDeFeu();
    $mage1->bouleDeFeu();
    
    


   




    
    
?>


