<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepository;
use Illuminate\Http\Request;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts(Request $request)
    {
        $filters = array();

        if ($request->has('product_name')) {
            $filters['products.name'] = $request->product_name;
        }
        if ($request->has('crm_order_number')) {
            $filters['orders.crm_order_number'] = $request->crm_order_number;
        }
        if ($request->has('project_name')) {
            $filters['projects.name'] = $request->project_name;
        }

        return $this->productRepository->all($filters);
    }
}
