<?php

namespace App\Repositories;


use App\Contracts\InventoryRepositoryInterface;
use App\Models\Inventory;

class InventoryRepository extends Repository implements InventoryRepositoryInterface
{
    protected $model;

    /**
     * @param Inventory $article
     */
    public function __construct(Inventory $article)
    {
        $this->model = $article;
    }

}