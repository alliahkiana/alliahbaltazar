<?php

namespace App\Services;

class ProductService
{
    protected array $products;

    public function __construct(array $products = [])
    {
        $this->products = $products;
    }

    public function listProducts(): array
    {
        return $this->products;
    }

    public function getProduct(int $id): ?array
    {
        foreach ($this->products as $product) {
            if ($product['id'] === $id) {
                return $product;
            }
        }
        return null;
    }

    public function insert(array $product): void
    {
        $this->products[] = $product;
    }
}
