<?php

namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
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
     * @param Category $category
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'identificador' => (int)$category->id,

            'titulo' => (int)$category->name,
            'detalles' => (int)$category->description,

            'fechaCreacion' => (string)$category->created_at,
            'fechaActualizacion' => (string)$category->updated_at,
            'fechaModificacion' => isset($category->deleted_at) ? (string) $category->deleted_at : null,
        ];
    }
    public static function originalAttribute($index){
        $attributes = [
            'identificador' =>'id',

            'titulo' => 'name',
            'detalles' => 'description',

            'fechaCreacion' => 'created_at',
            'fechaActualizacion' => 'updated_at',
            'fechaModificacion' =>'deleted_at',
        ];
        return isset($attributes[$index])? $attributes[$index] : null;
    }
}
