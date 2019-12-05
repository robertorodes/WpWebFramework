<?php

/**
 * Generic collection base class.
 *
 * @since      1.0.0
 * @package    Rodes\Collections
 *
 */

namespace Rodes\Collections;

abstract class GenericCollection implements \IteratorAggregate
{
    protected $values;

    public function __construct(...$values)
    {
        $this->setValues($values);
    }

    public function toArray()
    {
        return $this->getValues();
    }

    protected function &getValues() 
    {
        return $this->values;
    }

    private function setValues($values)
    {
        // TODO: Implement guards
        $this->values = $values;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->getValues());
    }
}