<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        $variable = [
            'ASC',
            'DESC'
        ];
        return [
            'product_name'     => 'in:'.implode(",", $variable),
            'crm_order_number' => 'in:'.implode(",", $variable),
            'project_name'     => 'in:'.implode(",", $variable),
        ];
    }
}
