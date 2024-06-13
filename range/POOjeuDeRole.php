<?php

// Interface pour le métier de forgeron
interface Forgeron {
    public function forger(): void;
}

// Interface pour le métier de tailleur
interface Tailleur {
    public function tisser(): void;
}

// Interface pour le métier de tanneur
interface Tanneur {
    public function taner(): void;
}

// Définition de la classe Personnage
class Personnage {
    private string $nom;
    private int $pointsDeVie;

    public function __construct(string $nom, int $pointsDeVie) {
        $this->nom = $nom;
        $this->pointsDeVie = $pointsDeVie;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getPointsDeVie(): int {
        return $this->pointsDeVie;
    }

    public function setPointsDeVie(int $pointsDeVie): void {
        $this->pointsDeVie = $pointsDeVie;
    }

    public function afficherInfos(): void {
        echo "Nom : {$this->nom}, Points de vie : {$this->pointsDeVie}" . PHP_EOL;
    }

    // Méthode pour utiliser le sort ultime
    public function utiliserSortUltime(): void {
        echo "{$this->nom} utilise son sort ultime !" . PHP_EOL;
    }
}

// Définition de sous-classes pour chaque rôle
class Guerrier extends Personnage implements Forgeron {
    private int $rage;
    private static int $RAGE_MIN = 0;
    private static int $RAGE_MAX;

    public function __construct(string $nom, int $pointsDeVie) {
        parent::__construct($nom, $pointsDeVie);
        $this->rage = self::$RAGE_MIN;
    }

    public function getRage(): int {
        return $this->rage;
    }

    public function setRage(int $rage): void {
        if ($rage < self::$RAGE_MIN) {
            $this->rage = self::$RAGE_MIN;
        } elseif (isset(self::$RAGE_MAX) && $rage > self::$RAGE_MAX) {
            $this->rage = self::$RAGE_MAX;
        } else {
            $this->rage = $rage;
        }
    }

    public function donnerCoupEpee(): void {
        echo "{$this->getNom()} donne un coup d'épée !" . PHP_EOL;
    }

    public static function getRageMin(): int {
        return self::$RAGE_MIN;
    }

    public static function setRageMax(int $rageMax): void {
        self::$RAGE_MAX = $rageMax;
    }

    public static function getRageMax(): int {
        return self::$RAGE_MAX;
    }

    public function forger(): void {
        echo "{$this->getNom()} forge une épée !" . PHP_EOL;
    }
}

class Mage extends Personnage implements Tailleur {
    private int $mana;
    private static int $MANA_MIN = 0;
    private static int $MANA_MAX;

    public function __construct(string $nom, int $pointsDeVie) {
        parent::__construct($nom, $pointsDeVie);
        if (isset(self::$MANA_MAX)) {
            $this->mana = self::$MANA_MAX;
        } else {
          $this->mana = self::$MANA_MIN;
        }
    }

    public function getMana(): int {
        return $this->mana;
    }

    public function setMana(int $mana): void {
        if ($mana < self::$MANA_MIN) {
            $this->mana = self::$MANA_MIN;
        } elseif (isset(self::$MANA_MAX) && $mana > self::$MANA_MAX) {
            $this->mana = $MANA_MAX;
        } else {
          $this->mana = $mana;
        }
    }

    public function lancerBouleDeFeu(): void {
        echo "{$this->getNom()} lance une boule de feu !" . PHP_EOL;
    }

    public static function getManaMin(): int {
        return self::$MANA_MIN;
    }

    public static function setManaMax(int $manaMax): void {
        self::$MANA_MAX = $manaMax;
    }

    public static function getManaMax(): int {
        return self::$MANA_MAX;
    }

    public function tisser(): void {
        echo "{$this->getNom()} tisse une robe de mage !" . PHP_EOL;
    }
}

class Archer extends Personnage implements Tanneur {
    private int $endurance;
    private static int $ENDURANCE_MIN = 0;
    private static int $ENDURANCE_MAX;

    public function __construct(string $nom, int $pointsDeVie) {
        parent::__construct($nom, $pointsDeVie);
        if (isset(self::$ENDURANCE_MAX)) {
            $this->endurance = self::$ENDURANCE_MAX;
        } else {
          $this->endurance = self::$ENDURANCE_MIN;
        }
    }

    public function getEndurance(): int {
        return $this->endurance;
    }

    public function setEndurance(int $endurance): void {
        if ($endurance < self::$ENDURANCE_MIN) {
            $this->mana = self::$ENDURANCE_MIN;
        } elseif (isset(self::$ENDURANCE_MAX) && $endurance > self::$ENDURANCE_MAX) {
            $this->endurance = $ENDURANCE_MAX;
        } else {
          $this->endurance = $endurance;
        }
    }

    public function tirerFleches(): void {
        echo "{$this->getNom()} tire des flèches !" . PHP_EOL;
    }

    public static function getEnduranceMin(): int {
        return self::$ENDURANCE_MIN;
    }

    public static function setEnduranceMax(int $enduranceMax): void {
        self::$ENDURANCE_MAX = $enduranceMax;
    }

    public static function getEnduranceMax(): int {
        return self::$ENDURANCE_MAX;
    }

    public function taner(): void {
        echo "{$this->getNom()} tanne une peau d'animal !" . PHP_EOL;
    }
}

// Définition de la classe Guilde
class Guilde {
    private string $nom;
    private array $membres = [];

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function ajouterMembre(Personnage $personnage): void {
        $this->membres[] = $personnage;
    }

    public function afficherNombreMembres(): void {
        echo "La guilde {$this->nom} compte " . count($this->membres) . " membres." . PHP_EOL;
    }

    public function listerMembres(): void {
        echo "Liste des membres de la guilde {$this->nom} :" . PHP_EOL;
        foreach ($this->membres as $membre) {
            echo "- {$membre->getNom()}" . PHP_EOL;
        }
    }
}

// Exemple d'utilisation
Archer::setEnduranceMax(100);
Mage::setManaMax(150);
Guerrier::setRageMax(200);

$guerrier = new Guerrier("Conan", 100);
$mage = new Mage("Gandalf", 80);
$archer = new Archer("Legolas", 90);

$guerrier->setRage(50);
$mage->setMana(100);
$archer->setEndurance(80);

$guilde = new Guilde("Les Héros");

$guilde->ajouterMembre($guerrier);
$guilde->ajouterMembre($mage);
$guilde->ajouterMembre($archer);

$guilde->afficherNombreMembres();
$guilde->listerMembres();

$guerrier->donnerCoupEpee();
$mage->lancerBouleDeFeu();
$archer->tirerFleches();

$guerrier->utiliserSortUltime();
$mage->utiliserSortUltime();
$archer->utiliserSortUltime();

$guerrier->forger();
$mage->tisser();
$archer->taner();
?>