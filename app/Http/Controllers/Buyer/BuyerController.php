<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        $compradores = Buyer::has('transactions')->get();
        return $this->showAll($compradores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Buyer $buyer
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */

    public function show(Buyer $buyer)
    {
        return $this->showOne($buyer);
    }


}
