<?php

namespace App\Service;

class HasherService
{
    public function hash($string)
    {
        return sha1($string);
    }
}
