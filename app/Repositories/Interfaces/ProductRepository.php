<?php


namespace App\Repositories\Interfaces;


interface ProductRepository
{
    public function all(array $filters, int $perPage = 10);

    public function getByWeight(int $weight = 400);
}
