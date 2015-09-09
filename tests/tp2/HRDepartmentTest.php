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

    public function testHireException()
    {
        \Phake::when($this->enterprise)->employ($this->person)->thenReturn(true);
        $this->setExpectedException('tp2\Exception\AlreadyEmployedException');
        $this->hrDepartement->hire($this->person);
    }

    public function testFire()
    {
        \Phake::when($this->enterprise)->employ($this->person)->thenReturn(true);
        $this->hrdepartement->fire($this->person);
        \Phake::verify($this->enterprise)->remove($this->person);
    }

    public function testFireException()
    {
        \Phake::when($this->enterprise)->employ($this->person)->thenReturn(false);
        $this->setExpectedException('tp2\Exception\NoEmployedException');
        $this->hrDepartement->fire($this->person);
    }

    public function testIsEmployee()
    {
         Phake::when($this->enterprise)->employ($this->person)->thenReturn(true);
         $this->assertTrue($this->hrdepartement->isEmployee($this->person));

         Phake::when($this->enterprise)->employ($this->person)->thenReturn(false);
         $this->assertFalse($this->hrdepartement->isEmployee($this->person));
    }


}