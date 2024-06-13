<?php

    class Person {
        // Attributes
        private string $firstName;
        private string $lastName;
        private int $age;

        // Methods
        public function printAttributes() : void {
            echo $this->firstName . " " . $this->lastName . " " . $this->age . " years old\n";
        }

        public function setFirstName(string $firstName) : void {
            $this->firstName = $firstName;
        }

        public function setLastName(string $lastName) : void {
            $this->lastName = $lastName;
        }

        public function setAge(int $age) : void {
            $this->age = $age;
        }

        public function getFirstName() : string {
            return $this->firstName;
        }

        public function getLastName() : string {
            return $this->lastName;
        }

        public function getAge() : int {
            return $this->age;
        }

        // Constructors
        public function __construct($firstName = "", $lastName = "", $age = 0) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->age = $age;
        }
    }

    class Company {
        // Attributes
        private string $name;
        private array $persons;

        // Methods
        public function __construct(string $name) {
            $this->name = $name;
            $this->persons = [];
        }

        public function addPerson(Person $person) : void {
            $this->persons[] = $person;
        }

        public function getPersons() : array {
            return $this->persons;
        }

        public function printPersons() : void {
            foreach ($this->persons as $person) {
                $person->printAttributes();
            }
        }

        public function getName() : string {
            return $this->name;
        }
    }

    // Usage
    $person1 = new Person();
    $person1->setFirstName("ruddy");
    $person1->setLastName("MARIA");
    $person1->setAge(30);

    $person2 = new Person("Jane", "Doe", 25);

    $company = new Company("Example Inc.");
    $company->addPerson($person1);
    $company->addPerson($person2);

    echo "Company: " . $company->getName() . "\n";
    echo "Employees:\n";
    $company->printPersons();
?>