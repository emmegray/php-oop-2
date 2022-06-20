<?php
class User
{
    private $name;
    private $surname;
    private $credit_card = '';

    public function __construct($_name, $_surname, $_credit_card = '')
    {
        $this->name = $_name;
        $this->surname = $_surname;
        $this->credit_card = $_credit_card;
    }

    public function printName()
    {
        echo $this->name . " " . $this->surname;
    }

    public function checkInvalidCreditCard()
    {
        if ($this->credit_card == '') {
            return true;
        } else {
            return false;
        }
    }
}
