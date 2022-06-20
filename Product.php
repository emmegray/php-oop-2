<?php

class Product
{
    public $name = "";
    private $price;
    public $type;
    public $quantity;

    public function __construct($_name, $_type, $_price = 0, $_quantity = 1)
    {
        $this->name = $_name;
        $this->type = $_type;
        $this->price = $_price;
        $this->quantity = $_quantity;
    }

    public function printName()
    {
        echo $this->name;
    }

    public function printPrice($discount = 0)
    {
        echo "euro: " . ($this->price - ($this->price / 100 * $discount));
    }

    public function checkAvailability()
    {
        if ($this->quantity > 0) {
            return true;
        } else {
            return false;
        }
    }
}

class Antipulci extends Product
{
    public function checkAvailability()
    {
        $month = date('m');

        if ($this->quantity > 0) {
            if ($month > 4 && $month < 9) {
                return true;
            }
        } else {
            return false;
        }
    }
}
