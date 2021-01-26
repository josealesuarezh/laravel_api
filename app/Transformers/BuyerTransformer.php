<?php

namespace App\Transformers;

use App\Buyer;
use League\Fractal\TransformerAbstract;

class BuyerTransformer extends TransformerAbstract
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
     * @param Buyer $buyer
     * @return array
     */
    public function transform(Buyer $buyer)
    {
        return [
            'identificador' => (int)$buyer->id,

            'nombre' => (int)$buyer->name,
            'email' => (int)$buyer->email,
            'verificado' => (int)$buyer->verified,

            'fechaCreacion' => (string)$buyer->created_at,
            'fechaActualizacion' => (string)$buyer->updated_at,
            'fechaModificacion' => isset($buyer->deleted_at) ? (string) $buyer->deleted_at : null,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('buyers.show',$buyer->id),
                ],
                [
                    'rel' => 'buyer.categories',
                    'href' => route('buyers.categories.index',$buyer->id),
                ],
                [
                    'rel' => 'buyer.products',
                    'href' => route('buyers.products.index',$buyer->id),
                ],
                [
                    'rel' => 'buyer.seller',
                    'href' => route('buyers.sellers.index',$buyer->id),
                ],
                [
                    'rel' => 'buyer.transactions',
                    'href' => route('buyers.transactions.index',$buyer->id),
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
            'verified' => 'verificado',

            'created_at'=> 'fechaCreacion',
            'updated_at'=> 'fechaActualizacion',
            'deleted_at'=> 'fechaModificacion',
        ];
        return isset($attributes[$index])? $attributes[$index] : null;
    }
}
