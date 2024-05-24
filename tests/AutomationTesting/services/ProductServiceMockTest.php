<?php

namespace Tests\AutomationTesting\services;

use App\AutomationTesting\models\Product;
use App\AutomationTesting\repository\ProductRepository;
use App\AutomationTesting\services\ProductService;
use PHPUnit\Framework\TestCase;

class ProductServiceMockTest extends TestCase
{
    private ProductRepository $productRepository;
    private ProductService $productService;
    private Product $product;

    protected function setUp(): void
    {
        $this->productRepository = self::createMock(ProductRepository::class);
        $this->productService = new ProductService($this->productRepository);
        $this->product = new Product();
        $this->product->setId("1");
        $this->product->setName("product 1");
    }

    public function testMock()
    {
        $product = new Product();
        $product->setId("1");
        $product->setName("product 1");

        $this->productRepository->expects($this->once())
            ->method('findById')
            ->willReturn($product);

        $result = $this->productRepository->findById("1");
        self::assertSame($product, $result);
    }

    public function testMockDeleteSuccess()
    {

        $this->productRepository->expects($this->once())
            ->method("delete");

        $product = new Product();
        $product->setId("1");
        $product->setName("product 1");

        $this->productRepository->expects($this->once())
            ->method("findById")
            ->willReturn($product);

        $this->productService->delete("1");
        self::assertTrue(true, "delete success");
    }

    public function testMockDeleteFail()
    {
        self::expectException(\Exception::class);
        $this->productRepository->expects($this->never())
            ->method("delete");

        $this->productRepository->expects($this->once())
            ->method("findById")
            ->willReturn(null);

        $this->productService->delete("1");
    }

    public function testDeleteVerificationParam()
    {
        $this->productRepository->expects($this->once())
            ->method("delete")
            ->with(self::equalTo($this->product));

        $this->productRepository->expects($this->once())
            ->method('findById')
            ->with(self::equalTo($this->product->getId()))
            ->willReturn($this->product);

        $this->productRepository->delete($this->product);
    }

}
