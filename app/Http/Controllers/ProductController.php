<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\IndexRequest;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(IndexRequest $request): View
    {
        $products = $this->productService->getProducts($request);
        return view('products.index', compact('products'));
    }
}
