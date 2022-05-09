<?php

/**
 * Function qui utilise la fonction native strrev() pour voir si l'int peut se lire dans les deux sens
 * Appelée dans findAllPalindromes()
 *
 * @param [type] $numberToCheck
 * @return boolean
 */
function isPalindrome($numberToCheck): bool
{
    $result = $numberToCheck == strrev($numberToCheck) ? true : false;
    return $result;
}

/**
 * Boucle sur chaque multiplication possible et retourne tous les palindromes trouvés dans un array
 * Appelée dans findHighestPalindrome()
 *
 * @return array
 */
function findAllPalindromes(): array
{

    $allPalindromes = [];

    $firstNumber = 999;
    $secondNumber = 999;

    // Boucle for pour chaque mutiplication possible
    for ($i = 0; $i < ($firstNumber * $secondNumber); $i++) {

        // Boucle for pour chaque premier entier de la multiplication, à chaque tour décrémenté de 1
        for ($i = 0; $i < ($firstNumber); $i++) {

            $numberToCheck = $firstNumber * $secondNumber;

            // Si le nombre est un palindrome il le push dans $allPalindromes[] puis le premier multiplicateur décrémente de 1, sinon le premier multiplicateur décrémente de 1
            if (isPalindrome($numberToCheck) == true) {

                // On récupère le palindrome + ses mutiplicateurs pour l'affichage
                $datas = [$numberToCheck, $firstNumber, $secondNumber];
                $allPalindromes[] = $datas;

                $firstNumber -= 1;
            } else {
                $firstNumber -= 1;
            }
        }

        // Reset du premier mutiplicateur et décrémente de 1 le second mutiplicateur pour l'itération suivante
        $firstNumber = 999;
        $secondNumber -= 1;
    }

    return $allPalindromes;
}

/**
 * Boucle Foreach sur le tableau retourné par la fonction findAllPalindromes() pour trouver l'int le plus grand et ses multiplicateurs
 *
 * @return string
 */
function findHighestPalindrome(): string
{

    $latestResult = 0;

    foreach (findAllPalindromes() as $key => $value) {

        // $value[0] est le palindrome, $value[1] & $value[2] ses multiplicateurs
        if ($value[0] > $latestResult) {

            $latestResult = $value[0];
            $result = $value[0] . ' (' . $value[1] . 'x' . $value[2] . ')';
        }
    }

    return $result;
}

echo PHP_EOL . 'Le plus grand palindrome issu de la multiplication de deux entiers naturels strictement inférieurs à 999 est ' . findHighestPalindrome() . ' !' . PHP_EOL;
