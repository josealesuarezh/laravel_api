<?php

namespace App\Transformers;

use App\Seller;
use App\User;
use League\Fractal\TransformerAbstract;

class SellerTransformer extends TransformerAbstract
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
     * @param Seller $seller
     * @return array
     */
    public function transform(Seller $seller)
    {
        return [
            'identificador' => (int)$seller->id,

            'nombre' => (int)$seller->name,
            'email' => (int)$seller->email,
            'verificado' => (int)$seller->verified,

            'fechaCreacion' => (string)$seller->created_at,
            'fechaActualizacion' => (string)$seller->updated_at,
            'fechaModificacion' => isset($seller->deleted_at) ? (string) $seller->deleted_at : null,

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('sellers.show',$seller->id),
                ],
                [
                    'rel' => 'seller.products',
                    'href' => route('sellers.products.index',$seller->id),
                ],
                [
                    'rel' => 'seller.transactions',
                    'href' => route('sellers.transactions.index',$seller->id),
                ],
                [
                    'rel' => 'seller.categories',
                    'href' => route('sellers.categories.index',$seller->id),
                ],
                [
                    'rel' => 'seller.buyers',
                    'href' => route('sellers.buyers.index',$seller->id),
                ],
            ],

        ];
    }

    public static function originalAttribute($index){
        $attributes = [
            'identificador' =>'id',

            'nombre' => 'name',
            'email' => 'email',
            'verificado' => 'verified',


            'fechaCreacion' => 'created_at',
            'fechaActualizacion' => 'updated_at',
            'fechaModificacion' =>'deleted_at',
        ];
        return isset($attributes[$index])? $attributes[$index] : null;
    }

    public static function transformedAttribute($index){
        $attributes = [
            'id' => 'identificador',

            'name'=> 'nombre',
            'email' => 'email',
            'verified'=> 'verificado',


            'created_at'=> 'fechaCreacion',
            'updated_at'=> 'fechaActualizacion',
            'deleted_at'=> 'fechaModificacion',
        ];
        return isset($attributes[$index])? $attributes[$index] : null;
    }
}

