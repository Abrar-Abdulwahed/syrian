<?php

namespace App\Actions;

use App\Models\Product;
use App\Contracts\OfferingsInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Resources\ProductReviewResource;

class ProductItem implements OfferingsInterface
{
    use ApiResponseTrait;
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return $this->returnJSON(new ProductReviewResource($product), 'Data retrieved successfully');
    }
}
