<?php

require_once('Expense.php');

class FoodExpense extends Expense
{
    function getType()
    {
        return 'FOOD';
    }
}