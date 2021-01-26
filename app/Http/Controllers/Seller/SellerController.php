<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;
use Illuminate\Http\Request;

class SellerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $vendedores = Seller::has('products')->get();
        return $this->showAll($vendedores);
    }

    public function show($id)
    {
        $vendedor = Seller::has('products')->findOrFail($id);
        return $this->showOne($vendedor,200);
    }


}
