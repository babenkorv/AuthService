<?php

namespace Classes\Hash;

class PolynomialAlgorithm implements HashAlgorithmInterface
{
    private $string;
    private $defaultParameter = 15;
    private $hashLength = 8;
    private $stringLangth = '';

    private $hash = '';

    public function __construct($string)
    {
        $this->string = $string;
        $this->string = "it's my string";
        $this->getHash( $this->string, 16 );

        $this->stringLangth = strlen($this->string);
    }

    private function calculateDeg()
    {

    }



    public function run()
    {

        $this->calculateDeg();

    }

    public function getHash($string, $langthHans)
    {
        $minLen = 2;
        $realMinLen = 0;

        $originalSault = $this->getControlSault($string);
        $originalLengeth = strlen($string);
        while($minLen <= $langthHans) {
            $minLen *= 2;
            $realMinLen = $minLen;
        }

        while ($minLen < $originalLengeth) {
            $minLen *= 2;
        }

        $addCount = $minLen - $originalLengeth;
        echo 'add count = ' . $addCount . '<br>';
        for ($i = 0; $i < $addCount; $i++) {
            $res = ord($string[$i]) + ord($string[$i + 1]);
            echo $res . '<br>';
            $string .= $this->toChar($res);
        }

        $maxSoult = $this->getControlSault($string);
        $maxLengthStr = strlen($string);
        echo $string . '<br> <hr>';

        while (strlen($string) != $realMinLen) {
            for ($i = 0, $center = strlen($string) / 2; $i < $center; $i++) {
                $this->hash .= $this->toChar(ord($string[$center - $i]) + ord($string[$center + $i]));

            }
            $string = $this->hash;
            $this->hash = '';

            echo $string . '<br>';
        }

    }

    public function getControlSault($string)
    {
        $sault = 0;

        for ($currecntChar = 0; $currecntChar < strlen($string); $currecntChar++) {
            $sault += ord($string[$currecntChar]);
        }
        echo 'sault ' . $sault . '<br>';
        return $sault;
    }
}