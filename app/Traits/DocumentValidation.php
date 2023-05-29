<?php

namespace App\Traits;

trait DocumentValidation
{
    public function validCi($document)
    {
        $documentArr = str_split($document);

        $coefficient = 2;
        $addition = 0;

        for($i = 0; $i < 9; $i++)
        {
            $operation = (int) $documentArr[$i] * $coefficient;
            $operation = $operation >= 10 ? $operation - 9 : $operation;
            $addition += $operation;
            $coefficient = $coefficient == 2 ? 1 : 2;
        }

        $additionArr = str_split($addition);
        $ten = (int) ($additionArr[0] + 1) * 10;
        $tester = $ten - $addition;
        $tester = $tester == 10 ? 0 : $tester;

        return $tester == (int) $documentArr[9] ? true : false;
    }
}
