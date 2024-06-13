<!-- ## **Exercice 1**
Créer une classe Voiture permettant de stocker son nom, son modèle (une lettre), son année de sortie et son prix. On veut également définir une méthode permettant d'afficher les informations de la voiture, enfin, on aimerait pouvoir modifier le prix de la voiture, pour appliquer une réduction.

Dans la méthode principale, initialiser un objet à partir de ces données :
| nom  | model | année | prix  |
|:---- |:----- |:----- |:----- |
| Clio | V     | 2019  | 19000 |

Puis réduire son prix à 17000.
<br><br><br> -->

<?php
    class Voiture {
        private string $name;
        private string $model;
        private int $dateout;
        private int $price;
        private int $reduc;

        public function __construct($name="",$model="",$dateout=0,$price=0,$reduc=0){
            $this->name=$name;
            $this->model=$model;
            $this->dateout=$dateout;
            $this->price=$price;
            $this->reduc=$reduc;
        }
        public function printcar(){
            
            
            echo "NOM : ".$this->name." | MODEL : ".$this->model." | ANNEE : ".$this->dateout." | PRIX : ".$this->price-$this->reduc;
        }
    }

$voiture=new Voiture("TOTO","V",1978,20000,2000);
$voiture->printcar();
?>
<!-- ## **Exercice 2**

Créer une classe Ecole permettant de stocker son nom, son type (primaire, université...) et sa ville. De plus, elle doit posséder une liste des domaines enseignés dans l'école. Si vous manquez d'inspiration :

| nom                    | type       | ville       |
|:---------------------- |:---------- |:----------- |
| La Rochelle Université | université | La Rochelle |
```
domaines : psychologie, mathématiques, médecine...
```
<br><br> -->

<?php
    class Ecole {
        private string $name;
        private string $type;
        private string $city;
        private array $domain;
       
        public function __construct($name="",$type="",$city="",$domain=[]){
            $this->name=$name;
            $this->type=$type;
            $this->city=$city;
            $this->domain=$domain;
           
        }
        public function add_domain($domain){
            $this->domain = array_merge($this->domain, $domain);
            
            
            return $this->domain;
        }
        public function printschool(){
            
            
           
           echo "NOM : ".$this->name." | TYPE : ".$this->type." | CITY : ".$this->city." | DOMAINE : ( ".implode(", ", $this->domain)." )";
        }
    }
$domain=["math","physique","techno"];
$domain_add="testtttt";
$test=explode(",",$domain_add);
$ecole=new Ecole("Universite de POITIERS","Universite");
$ecole->add_domain($domain);
$ecole->add_domain($test);
$ecole->printschool();

?>
<br><br>
<!-- ## **Exercice 3**

Créer une classe Groupe permettant de stocker son nom et ses membres. Attention, pour vous entraîner à manipuler un dictionnaire, je vous invite à stocker les membres avec le nom comme clé et l'âge comme valeur. 

On veut pouvoir ajouter un membre, il faudra donc créer une méthode adaptée. On en créera une autre pour récupérer l'âge d'un membre à partir de son nom.

Enfin, on veut pouvoir afficher le nom du groupe et le modifier. -->

<?php
    class Groupe {
        private string $nom;
        private array $membres;
    
        public function __construct(string $nom, array $membres = []) {
            $this->nom = $nom;
            $this->membres = $membres;
        }
    
        public function ajouterMembre(string $nom, int $age): void {
            $this->membres[$nom] = $age;
        }
    
        public function recupererAgeMembre(string $nom) {
            return $this->membres[$nom] ?? null;
        }
    
        public function afficherNomGroupe(): string {
            
            return $this->nom;
        }
    
        public function modifierNomGroupe(string $nouveauNom): void {
            $this->nom = $nouveauNom;
            echo "Nouveau nom du groupe : " . $this->nom . "\n";
        }
    }
$groupe = new Groupe("Groupe A");
$groupe->ajouterMembre("Alice", 25);
$groupe->ajouterMembre("Bob", 30);

echo "Nom du groupe : " . $groupe->afficherNomGroupe() . "\n";
echo "Âge de Alice : " . $groupe->recupererAgeMembre("Alice") . "\n";
echo "Âge de Bob : " . $groupe->recupererAgeMembre("Bob") . "\n";

$groupe->modifierNomGroupe(" Groupe");


?>
