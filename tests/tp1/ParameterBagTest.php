<?php

namespace tests\tp1;

use tp1\ParameterBag;

class ParameterBagTest extends \PHPUnit_Framework_TestCase
{
    protected $bag;

    public function setUp()
    {
        $this->bag = new ParameterBag(array('foo' => 'bar', 'baz' => '2'));
    }

    public function testCount()
    {
        $this->assertEquals(2, $this->bag->count());
    }

    public function testGet()
    {
        // will pass
        $this->assertEquals('bar', $this->bag->get('foo'));

        // will fail
        //$this->assertEquals('lol', $bag->get('foo'));
    }

    public function testGetInt()
    {
        $this->assertEquals(2, $this->bag->getInt('baz'));

    }

    public function testSet()
    {
        $this->bag->set('toto','tata');
        $this->assertEquals(3, $this->bag->count());

    }

    public function testHas()
    {
        $this->assertEquals(true, $this->bag->has('foo'));
        $this->assertEquals(false, $this->bag->has('poney'));
    }

    public function testRemove()
    {
        $this->bag->remove('foo');
        $this->assertEquals(1, $this->bag->count());
    }

    public function testAll()
    {
        $this->assertEquals(array('foo' => 'bar', 'baz' => '2'), $this->bag->all());
    }

    public function testKeys()
    {
        $this->assertEquals(array('foo', 'baz'), $this->bag->keys());
    }

    public function testAdd()
    {
        $montableau = array('toto' => 'tata');
        $this->bag->add($montableau);
        $this->assertEquals(3, $this->bag->count());
    }
}
