<?php

namespace tests\tp2;

use tp2\Person;
use tp2\Enterprise;
use tp2\HRDepartment;

class HRDepartmentTest extends \PHPUnit_Framework_TestCase
{

    protected $person;
    protected $hrdepartment;
    protected $enterprise;

    public function setUp()
    {
        $this->person = New Person('fred');
        $this->enterprise = \Phake::mock('tp2/Enterprise');
        $this->hrdepartment = new HRDepartment($this->enterprise);
        
    }

    public function testHire()
    {
        \Phake::when($this->enterprise)->employ($this->person)->thenReturn(false);
        $this->hrdepartement->hire($this->person);
        \Phake::verify($this->enterprise)->add($this->person);
    }


    public function testFire()
    {
        \Phake::when($this->enterprise)->employ($this->person)->thenReturn(true);
        $this->hrdepartement->fire($this->person);
        \Phake::verify($this->enterprise)->remove($this->person);

    }

    public function testIsEmployee()
    {
         Phake::when($this->enterprise)->employ($this->person)->thenReturn(true);
         Phake::when($this->enterprise)->employ($this->person)->thenReturn(false);
    }


}