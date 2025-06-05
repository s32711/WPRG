<?php

interface Employee {
    public function getSalary();
    public function setSalary($salary);
    public function getRole();
}

class Manager implements Employee {
    private $salary;
    private $employees = [];

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getRole() {
        return get_class($this);
    }

    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function getEmployees() {
        return $this->employees;
    }
}

class Developer implements Employee {
    private $salary;
    private $programmingLanguage;

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getRole() {
        return get_class($this);
    }

    public function setProgrammingLanguage($programmingLanguage) {
        $this->programmingLanguage = $programmingLanguage;
    }

    public function getProgrammingLanguage() {
        return $this->programmingLanguage;
    }
}

class Designer implements Employee {
    private $salary;
    private $designingTool;

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getRole() {
        return get_class($this);
    }

    public function setDesigningTool($designingTool) {
        $this->designingTool = $designingTool;
    }

    public function getDesigningTool() {
        return $this->designingTool;
    }
}

$dev = new Developer();
$dev->setSalary(5000);
$dev->setProgrammingLanguage("PHP");

$manager = new Manager();
$manager->setSalary(8000);
$manager->addEmployee($dev);

echo $manager->getRole();
echo "<br>" . $dev -> getSalary();
?>