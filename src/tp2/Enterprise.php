<?php

namespace tp2;

use tp2\Person;

class Enterprise
{
    /**
     * Enterprise storage.
     *
     * @var array
     */
    protected $enterprise;

    public function __construct(array $enterprise = array()) 
    {
        $this->enterprise = $enterprise;
    }

    public function add(Person $person)
    {
        array_push($this->enterprise, $person);
    }

    public function remove(Person $personToRemove)
    {
        $result = array_search($personToRemove, $this->enterprise);
        unset($this->enterprise[$result]);
    }

    /**
     * @return boolean
     */
    public function employ(Person $person)
    {
        foreach ($this->enterprise as $p) {
            if($p === $person) {
                return true;
            }
        }
        return false;
    }
}