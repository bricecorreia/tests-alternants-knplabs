<?php

class ScriptFibonacci
{
    public function __construct(
        private int $fiboMaxNumber = 4000000,
        private array $fiboArray = [1, 1],
    ) {}

    /**
     * Return the next number of the Fibonacci sequence
     * Called in findSequence()
     *
     * @return integer
     */
    public function findNextNumber(): int
    {
        $nextNumber = $this->fiboArray[count($this->fiboArray) - 2] + end($this->fiboArray); // make an addition with the 2 last numbers of the fiboArray 

        return $nextNumber;
    }

    /**
     * Insert the next number find with findNextNumber() in our Fibonacci sequence
     * Called in findSequence()
     *
     * @param [type] $nextNumber
     * @return void
     */
    public function insertNumber($nextNumber)
    {
        $newFiboArray = $this->fiboArray;
        $newFiboArray[] += $nextNumber;
        $this->fiboArray = $newFiboArray;
    }

    /**
     * Find all the Fibonacci sequence with a while loop using findNextNumber()
     *
     * @return void
     */
    public function findSequence()
    {
        $i = 0;

        // Stop the script when the max number of the Fibonacci sequence is hit
        while ($i <= $this->fiboMaxNumber) {

            $nextNumber = $this->findNextNumber();

            if ($nextNumber <= $this->fiboMaxNumber) { 

                $this->insertNumber($nextNumber);
            }

            $i = $nextNumber;
        }
    }

    /**
     * Isol evens from odds in our Fibonacci sequence with modulo 2 === 0
     * Called in evenNumbersAddition()
     * 
     * @return array
     */
    public function isolEvenNumbers(): array
    {
        $fiboArray = $this->fiboArray;
        $evenArray = [];

        foreach ($fiboArray as $key => $value) {

            if ($value % 2 === 0) {

                array_push($evenArray, $value);
            }
        }
        return $evenArray;
    }

    /**
     * Make an addition with all the numbers finded with isolEvenNumbers()
     * Called in fibonacciScript()
     * 
     * @return integer
     */
    public function evenNumbersAddition(): int
    {
        $result = array_sum($this->isolEvenNumbers());

        return $result;
    }

    /**
     * Last method who return the result of the script
     *
     * @return integer
     */
    public function fibonacciScript(): int
    {
        $this->findSequence();
        $result = $this->evenNumbersAddition();
        
        return $result;
    }
}

$fibonacci = new ScriptFibonacci;

echo PHP_EOL . 'Le résultat de l\'addiction de tous les chiffres pairs de la suite de Fibonacci est ' . $fibonacci->fibonacciScript() . ' !' . PHP_EOL;
