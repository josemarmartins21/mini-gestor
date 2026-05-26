<?php

namespace App\services\contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface VendaCrud 
{
    public function list(): LengthAwarePaginator;
}