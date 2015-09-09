<?php

namespace tp2;

use tp2\Person;
use tp2\Enterprise;
use tp2\Exception\AlreadyEmployedException;
use tp2\Exception\NoEmployedException;

class HRDepartment
{
    protected $entreprise;
    public function __construct(Enterprise $entreprise)
    {
        $this->entreprise = $entreprise;
    }
    /**
     * @throws \tp2\Exception\AlreadyEmployedException When the given person is already an employee
     */
    public function hire(Person $person)
    {
        if($this->entreprise->employ($person) === true)
        {
            throw new AlreadyEmployedException('the given person is already an employee');
        }
        $this->entreprise->add($person);
    }
    /**
     * @throws \tp2\Exception\NoEmployedException When the given person is not an employee
     */
    public function fire(Person $person)
    {
        if($this->entreprise->employ($person) === false)
        {
            throw new NoEmployedException('the given person is not an employee');
        }
        $this->entreprise->remove($person);
    }
    /**
     * @return boolean
     */
    public function isEmployee(Person $person)
    {
       return $this->entreprise->employ($person);
    }
}