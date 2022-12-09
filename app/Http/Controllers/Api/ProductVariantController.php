<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductVariantRequest;
use App\Http\Resources\ProductVariantResource;
use App\Http\Resources\ProductVariantResourceCollection;
use App\Models\ProductVariant;
use Illuminate\Http\Response;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productVariants = ProductVariant::paginate();
        return (new ProductVariantResourceCollection($productVariants))->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductVariantRequest $request)
    {
        $productVariant = new ProductVariant();
        $productVariant->product_id = $request->product_id;
        $productVariant->variant = $request->variant;
        $productVariant->stock_quantity = $request->stock_quantity;
        $productVariant->save();
        return (new ProductVariantResource($productVariant))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariant $productVariant)
    {
        return (new ProductVariantResource($productVariant))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function update(ProductVariantRequest $request, ProductVariant $productVariant)
    {
        $productVariant->fill($request->only([
            'product_id',
            'variant',
            'stock_quantity',
        ]));
        $productVariant->save();
        return (new ProductVariantResource($productVariant))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariant $productVariant)
    {
        $productVariant->delete();
        return response()->json([
            'status' => Response::HTTP_OK,
        ]);
        //
    }
}
