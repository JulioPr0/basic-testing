<?php

namespace App\AutomationTesting\repository;

use App\AutomationTesting\models\Product;

interface ProductRepository
{
    function save(Product $product): Product;
    function delete(Product $product): void;
    function findById(string $id): ?Product;
    function findAll(): array;
}
