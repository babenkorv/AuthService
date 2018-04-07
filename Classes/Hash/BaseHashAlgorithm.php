<?php
/**
 * Created by PhpStorm.
 * User: rom4ik
 * Date: 18.03.2018
 * Time: 18:35
 */

namespace Classes\Hash;


class BaseHashAlgorithm implements HashAlgorithmInterface
{
    public function run()
    {
    }

    protected function toChar($ascii)
    {
        while ($ascii > 122 || $ascii < 48) {

            if ($ascii > 122) {

                $ascii -= 122;
            }
            if ($ascii < 48) {
                $ascii += 48;
            }
        }

        return chr($ascii);
    }
}