<?php

namespace Classes\Hash;

class CustomAlgorithm extends BaseHashAlgorithm
{
    private $string;
    private $originalString = '';
    private $stringLangth = '';
    private $hashLength;
    private $requiredMinimumStringLength;
    private $hashMinLength= 2;

    private $hash = '';

    public function __construct($string, $length = 32)
    {
        $this->hashMinLength = 2;
        $this->originalString = $string;
        $this->hashLength = $length;

       //$this->getHash($this->originalString, 32);


        $this->stringLangth = strlen($this->string);
    }

    public function run()
    {

        echo '<pre>';
        var_dump('original string = ' . $this->originalString);

        $this->string = $this->addMissingChars($this->originalString);
        var_dump('extended string = ' . $this->string);

        $originalSault = $this->getControlSault($this->originalString);
        var_dump('original soult = ' . $originalSault);
        $maxSoult = $this->getControlSault($this->string);
        var_dump('max soult = ' . $maxSoult);

        var_dump('res strin leng = ' . strlen($this->string));

        while (strlen($this->string) !=  $this->hashLength) {
            for ($i = 0, $center = strlen($this->string) / 2; $i < $center; $i++) {
                $this->hash .= $this->toChar(ord($this->string[$center - $i]) + ord($this->string[$center + $i]));

            }
            $this->string = $this->hash;
            $this->hash = '';
        }

        var_dump($this->string);

    }

    private function addMissingChars($string)
    {
        $realMinLen = 0;
        $requiredMinimumStringLength = 2;

        $originalLengeth = strlen($string);

        while ($requiredMinimumStringLength <= $this->hashLength) {
            $requiredMinimumStringLength *= 2;
            $this->requiredMinimumStringLength = $requiredMinimumStringLength;
        }

        while ($requiredMinimumStringLength < $originalLengeth) {
            $requiredMinimumStringLength *= 2;
        }

        $addCount = $requiredMinimumStringLength - $originalLengeth;

        for ($i = 0; $i < $addCount; $i++) {
            $res = ord($string[$i]) + ord($string[$i + 1]);
            $string .= $this->toChar($res);
        }

        return $string;
    }

    public function getControlSault($string)
    {
        $sault = 0;

        for ($currecntChar = 0; $currecntChar < strlen($string); $currecntChar++) {
            $sault += ord($string[$currecntChar]);
        }

        return $sault;
    }
}