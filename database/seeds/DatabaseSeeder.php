<?php

use App\Category;
use App\Product ;
use App\Transaction;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEYS_CHECKS = 0');
//        User::truncate();
//        Category::truncate();
//        Product::truncate();
//        Transaction::truncate();
//        DB::table('category_product')->truncate();

        $cantidadUsuarios =  200;
        $cantidadCategorias =  30;
        $cantidadProductos =  1000;
        $cantidadTransacciones =  1000;

        factory(User::class,$cantidadUsuarios)->create();
        factory(Category::class,$cantidadCategorias)->create();

        factory(Product::class,$cantidadProductos)->create()->each(
            function ($product){
                $categorias = Category::all()->random(mt_rand(1,5))->pluck('id');
                $product->categories()->attach($categorias);
            }
        );

        factory(Transaction::class,$cantidadTransacciones)->create();
    }
}