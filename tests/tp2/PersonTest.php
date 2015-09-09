<?php

namespace tests\tp2;

use tp2\Person;

class PersonTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $person = new Person('fred');
        $this->assertEquals('fred', $person->getName());
    }
}