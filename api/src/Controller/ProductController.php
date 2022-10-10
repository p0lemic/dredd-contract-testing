<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'product.list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        return $this->json([
            [
                'id' => 'e7ba4c75-b1bb-483d-94d8-2c4a10f78472',
                'title' => 'Lagavulin 16 Years',
                'sku' => '556312',
                'price' => 89.90,
                'currency' => '€',
                'slug' => 'lagavulin-16-years',
                'published' => true,
                'createdAt' => '1970-01-01T00:00:00.001Z',
                'updatedAt' => '1970-01-01T00:00:00.001Z',
            ],
            [
                'id' => 'b580b471-fbf2-4498-8127-81cb89870aa9',
                'title' => 'The Macallan Sherry Oak 12 Years',
                'sku' => '479024',
                'price' => 75.90,
                'currency' => '€',
                'slug' => 'the-macallan-sherry-oak-12-years',
                'published' => true,
                'createdAt' => '1970-01-01T00:00:00.001Z',
                'updatedAt' => '1970-01-01T00:00:00.001Z',
            ],
        ]);
    }

    #[Route('/product/{id}', name: 'product.get', methods: ['GET'])]
    public function get(): JsonResponse
    {
        return $this->json(
            [
                'id' => 'e7ba4c75-b1bb-483d-94d8-2c4a10f78472',
                'title' => 'Lagavulin 16 Years',
                'sku' => '556312',
                'price' => 89.90,
                'currency' => '€',
                'slug' => 'lagavulin-16-years',
                'published' => true,
                'createdAt' => '1970-01-01T00:00:00.001Z',
                'updatedAt' => '1970-01-01T00:00:00.001Z',
            ]);
    }
}
