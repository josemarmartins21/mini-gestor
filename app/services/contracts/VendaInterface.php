<?php

namespace App\services\contracts;

interface VendaInterface 
{
    public function create($data = []): void;
}