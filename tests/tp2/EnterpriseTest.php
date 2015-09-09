<?php

namespace tests\tp2;

use tp2\Enterprise;
use tp2\Person;

class EnterpriseTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $enterprise = new Enterprise();
        $person = new Person('john');
        $enterprise->add($person);

        $this->assertEquals(true, $enterprise->employ($person));
    }

    public function testRemove()
    {
        $enterprise = new Enterprise();
        $person = new Person('john');

        $enterprise->add($person);
        $this->assertEquals(true, $enterprise->employ($person));

        $enterprise->remove($person);
        $this->assertEquals(false, $enterprise->employ($person));

    }

    public function testEmploy()
    {
        $enterprise = new Enterprise();
        $person = new Person('john');
        $this->assertEquals(false, $enterprise->employ($person));

        $enterprise->add($person);

        $this->assertEquals(true, $enterprise->employ($person));
    }
}