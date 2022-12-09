<?php

namespace App\Http\Resources;

use App\Enums\MediaCollectionEnum;
use App\Models\ProductVariant;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'main_image' => $this->getFirstMediaUrl(MediaCollectionEnum::PRODUCT['MAIN_IMAGE']),
            'product_variants' => new ProductVariantResource($this->productVariants),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
