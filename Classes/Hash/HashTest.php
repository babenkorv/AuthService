<?php

namespace Classes\Hash;

class HashTest
{
    private static $settings;

    public static function setSettings($settings = [])
    {
        self::$settings = array_merge(self::getDefaultSettings(), $settings);

    }

    public static function executeTest()
    {

    }

    private static function getDefaultSettings()
    {
        return [
            'algorytm' => [
                'md5',
                'sha256',
            ],
//            'countOfWords' => 1000000,
            'countOfWords' => 1000,
            'minWordLen' => 8,
            'maxWordLen' => 8,
        ];
    }

    private static function getWordLen()
    {
        return rand(self::$settings['minWordLen'], self::$settings['maxWordLen']);
    }

    private static function getAsciiChar()
    {
         return rand(48, 122);
    }

    private static function getLatinLettersOrNumbers()
    {
        $ascii = self::getAsciiChar();

        while (($ascii >= 45 && $ascii <= 64) || ($ascii >= 91 && $ascii <= 96)) {
            $ascii = self::getAsciiChar();

        }

        return chr($ascii);
    }

    public static function geneateData()
    {
        for ($i = 0; $i < self::$settings['countOfWords']; $i++) {
            $genaretedWord = '';
            for ($char = 0; $char < self::getWordLen(); $char++) {
                $genaretedWord .= self::getLatinLettersOrNumbers();
            }
            echo '<pre>';
            var_export($genaretedWord);

        }
    }


}