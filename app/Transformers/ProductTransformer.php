<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'identificador' => (int)$product->id,

            'titulo' => (string)$product->name,
            'detalles' => (string)$product->descripcion,
            'disponibles' => (int)$product->quantity,
            'estado' => (string)$product->status,
            'image' => url("img/{$product->image}"),
            'vendedor' => (int)$product->seller_id,

            'fechaCreacion' => (string)$product->created_at,
            'fechaActualizacion' => (string)$product->updated_at,
            'fechaModificacion' => isset($product->deleted_at) ? (string) $product->deleted_at : null,

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('products.show',$product->id),
                ],
                [
                    'rel' => 'products.buyers',
                    'href' => route('products.buyers.index',$product->id),
                ],
                [
                    'rel' => 'products.categories',
                    'href' => route('products.categories.index',$product->id),
                ],
                [
                    'rel' => 'seller',
                    'href' => route('sellers.show',$product->seller_id),
                ],
                [
                    'rel' => 'products.transactions',
                    'href' => route('products.transactions.index',$product->id),
                ],
            ],

        ];
    }
    public static function originalAttribute($index){
        $attributes = [
            'identificador' =>'id',

            'titulo' => 'name',
            'detalles' => 'description',
            'disponibles' => 'quantity',
            'estado' => 'status',
            'image' => 'image',
            'vendedor' => 'seller_id',

            'fechaCreacion' => 'created_at',
            'fechaActualizacion' => 'updated_at',
            'fechaModificacion' =>'deleted_at',
        ];
        return isset($attributes[$index])? $attributes[$index] : null;
    }

    public static function transformedAttribute($index){
        $attributes = [
            'id' => 'identificador',

            'name'=> 'titulo',
            'description' => 'detalles',
            'quantity'=> 'disponibles',
            'status'=> 'estado',
            'image'=> 'image',
            'seller_id'=> 'vendedor',

            'created_at'=> 'fechaCreacion',
            'updated_at'=> 'fechaActualizacion',
            'deleted_at'=> 'fechaModificacion',
        ];
        return isset($attributes[$index])? $attributes[$index] : null;
    }
}
