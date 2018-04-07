<?php

namespace Classes\Hash;

class HashClass
{
    private $hashAlgorithm;

    public function __construct(HashAlgorithmInterface $hashAlgorithm)
    {
        $this->hashAlgorithm = $hashAlgorithm;
    }

    public function executeHashing()
    {
        return $this->hashAlgorithm->run();
    }
}