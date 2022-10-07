<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json([
            'id' => 'e7ba4c75-b1bb-483d-94d8-2c4a10f78472',
            'sku' => '556312',
            'price' => 49.99,
            'currency' => '€',
            'slug' => 'lagavulin-16-years',
            'published' => true,
            'createdAt' => '1970-01-01T00:00:00.001Z',
            'lastModifiedAt' => '1970-01-01T00:00:00.001Z',
        ]);
    }
}
