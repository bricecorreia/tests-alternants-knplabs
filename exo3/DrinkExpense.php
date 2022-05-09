<?php

require_once('Expense.php');

class DrinkExpense extends Expense
{
    function getType()
    {
        return 'DRINK';
    }
}
