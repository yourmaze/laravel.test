<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ProductOrmRepository implements ProductRepository
{
    public function all(array $filters, int $perPage = 10): LengthAwarePaginator
    {
        $query = DB::table('products')
            ->select('products.*', 'orders.weight', 'orders.crm_order_number', 'projects.name as project_name', 'projects.id as project_id')
            ->join('orders', 'orders.id', '=', 'products.order_id')
            ->join('projects', 'projects.id', '=', 'orders.project_id');

        foreach ($filters as  $filterKey => $filter) {
            $query->orderBy($filterKey, $filter);
        }

        return $query
            ->orderBy('orders.weight')
            ->paginate($perPage);
    }

    public function getByWeight(int $weight = 400): array
    {
        return DB::select('
            SELECT *
            FROM products
            WHERE order_id IN (SELECT id FROM orders WHERE weight > '.$weight.')
            ORDER BY products.id ASC
        ');
    }
}
