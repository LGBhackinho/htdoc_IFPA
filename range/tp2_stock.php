<?php
    class Magasin{
        private array $produits;
        public function __construct() {
            $this->produits = [];
        }

        function getProduits() : array {
            return $this->produits;

        }
        public function addProduit(Produit $produit) : void{
            array_push($this->produits, $produit);
        }
        

        function printProduits() : void{

            foreach ($this->produits as $produit) {
                $produit->printProduit() ;

            }
        }
    }
    class Produit{
        protected string $name;
        protected string $identity;
        protected float $price;
        protected int $qty;
        protected int $promo;
        

        function __construct(string $identity, float $price,string $name, int $qty,float $promo=0.0){
            $this->name = $name;
            $this->identity = $identity;
            $this->price = $price;
            $this->qty =$qty;
            $this->promo=$promo;
           

        }
        

        function getName() : string {
            return $this->name;
        }
            
        function getidentity() : string {
            return $this->identity;
        }

        function getPrice():float{
            return $this->price;
        }

        function getQty():int{
            return $this->qty;
        }
        function getPromo():float{
            return $this->promo;
        }

        function appliquePromo():float{
            return $this->price-($this->price*($this->promo/100.0));
            
        }

        function printProduit() : void{
            echo "<br>";
            echo "Produit ";
            echo "<br>";
            echo "Identification : ".$this->identity. $this->price. $this->name. $this->qty."<br>";
            echo "Prix : ". $this->price."<br>";
            echo "Nom : ". $this->name."<br>";
            echo "Quantité : ".$this->qty."<br>";
            echo "Promo : ".$this->promo."%"."<br>";
            echo "Nouveau Prix : ". $this->appliquePromo()."<br>";
            
        }
    }

    class Bricolage extends Produit {

        
        private string $rayon;
        private string $elec;

        function getRayon():string {
            return $this->rayon;
        }
        function getElec():string {
            return $this->elec;
        }

        
        function printProduit() : void{
            // echo "<br>";
            // echo "Produit De bricolage "."<br>";
            // echo "Identification : ".$this->identity."<br>";
            // echo "Prix : ". $this->price."<br>";
            // echo "Nom : ". $this->name. "<br>";
            // echo "Quantité : ". $this->qty."<br>";
            parent::printProduit();
            echo "Rayon : ".$this->rayon."<br>";
            echo "Electrique ou non : ".$this->elec."<br>";
            
        }
        public function __construct(string $identity, float $price,string $name,int $qty,float $promo=0.0,string $rayon,string $elec) {
            parent::__construct($identity,$price,$name,$qty,$promo);
            $this->rayon = $rayon;
            $this->elec = $elec;
        }
        
        
    }

    class Jardinage extends Produit{
        private string $season;

        function getSeason(): string{
            return $this->season;
        }
        
        function printProduit() : void {
            // echo "<br>";
            // echo "Produit De jardinage "."<br>";
            // echo "Identification : ".$this->identity."<br>";
            // echo "Prix : ". $this->price."<br>";
            // echo "Nom : ". $this->name. "<br>";
            // echo "Quantité : ". $this->qty."<br>";
            parent::printProduit();
            echo "Saison : ".$this->season."<br>";
            
        }
        public function __construct(string $identity, float $price,string $name,int $qty,float $promo=0.0,string $season) {
            parent::__construct($identity,$price,$name,$qty,$promo);
            $this->season = $season;
        }
        
 }    

 class ProdAnimal extends Produit {

        
    private string $animal;
    private float $poidPaq;

    function getAnimal():string {
        return $this->animal;
    }
    function getPoidPaq():float {
        return $this->poidPaq;
    }

    
    function printProduit() : void{
        // echo "<br>";
        // echo "Produit Animal";
        // echo "Identification : ".$this->identity."<br>";
        // echo "Prix : ". $this->price."<br>";
        // echo "Nom : ". $this->name. "<br>";
        // echo "Quantité : ". $this->qty."<br>";
        parent::printProduit();
        echo "Animal : ".$this->animal."<br>";
        echo "Poid du paquet : ".$this->poidPaq."<br>";
       
        
    }
    public function __construct(string $identity, float $price,string $name,int $qty,float $promo=0.0,string $animal,float $poidPaq) {
        parent::__construct($identity,$price,$name,$qty,$promo);
        $this->animal = $animal;
        $this->poidPaq = $poidPaq;
    }
    
}

 // $csv1=[Jardinage,Rat345,50,Rateau,12,Ete];
 // $csv2="Jardinage;Rat456;150;Rateau;5;Ete";
    
    

    
    $jardin1= new Jardinage ("Rat345",50.0,"Rateau",12,50.0,"Ete");
    $jardin2= new Jardinage ("Rat456",150.0,"Rateau",5,0.0,"Ete");
    $brico1= new Bricolage ("Clou12",20.0,"Boite clous",50,0.0,"Quinquaillerie","Nonelectrique");
    $animal1= new ProdAnimal("chien001",12.5,"Croquette",51,0.0,"Labrador",15.0);
    
    $magasin= new Magasin();
    
    
   
    $magasin->addProduit($jardin1);
    $magasin->addProduit($jardin2);
    $magasin->addProduit($brico1);
    $magasin->addProduit($animal1);

    $magasin->printProduits();
    //$jardin1->printProduit();


   // Exemple pour passer des argument dasn un ordre different

    function fonction_exemple($a, $b, $c) {
        echo "a : $a\n";
        echo "b : $b\n";
        echo "c : $c\n";
    }
    
    // Appel de la fonction avec les arguments dans l'ordre défini
    fonction_exemple(1, 2, 3);
    
    // Appel de la fonction avec les arguments en utilisant le format nommé
    fonction_exemple(c: 3, a: 1, b: 2);




    
    
?>


