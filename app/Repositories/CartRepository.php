<?php

namespace App\Repositories;


use App\Contracts\CartRepositoryInterface;
use App\Models\Cart;

class CartRepository extends Repository implements CartRepositoryInterface
{
    protected $model;

    /**
     * @param Cart $article
     */
    public function __construct(Cart $article)
    {
        $this->model = $article;
    }
}