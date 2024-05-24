<?php

namespace Tests\AutomationTesting\services;

use App\AutomationTesting\models\Product;
use App\AutomationTesting\repository\ProductRepository;
use App\AutomationTesting\services\ProductService;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
    private ProductRepository $productRepository;
    private ProductService $productService;

    public function setUp(): void
    {
        $this->productRepository = self::createStub(ProductRepository::class);
        $this->productService = new ProductService($this->productRepository);
    }

    public function testStub()
    {
        $product = new Product();
        $product->setId("1");

        $this->productRepository->method('findById')
            ->willReturn($product);

        $result = $this->productRepository->findById("2");
        self::assertSame($product, $result);
    }

    public function testStubMap() {
        $product1 = new Product();
        $product1->setId("1");

        $product2 = new Product();
        $product2->setId("1");

        $map = [
            ["1", $product1],
            ["2", $product2]
        ];

        $this->productRepository->method('findById')
            ->willReturnMap($map);

        self::assertSame($product1, $this->productRepository->findById("1"));
        self::assertSame($product2, $this->productRepository->findById("2"));
    }

    public function testStubCallback()
    {
        $this->productRepository->method('findById')
            ->willReturnCallback(function ($id){
                $product = new Product();
                $product->setId($id);
                return $product;
            });

        $product1 = new Product();
        $product1->setId("1");

        self::assertSame("1", $this->productRepository->findById("1")->getId());
    }

    public function testRegisterPositive()
    {
        $this->productRepository->method("findById")
            ->willReturn(null);

        $this->productRepository->method("save")
            ->willReturnArgument(0);

        $product = new Product();
        $product->setId("1");
        $product->setName("product 1");

        $result = $this->productService->register($product);
        self::assertEquals($product->getId(), $result->getId());
        self::assertEquals($product->getName(), $result->getName());
    }

    public function testRegisterNegative()
    {
        self::expectException(\Exception::class);
        $productInDB = new Product();
        $productInDB->setId("1");
        $productInDB->setName("product 1");

        $this->productRepository->method('findById')
            ->willReturn($productInDB);

        $product = new Product();
        $product->setId("1");
        $product->setName("product 1");

        $this->productService->register($product);
    }

    public function testStubDeleteSuccess()
    {
        $product = new Product();
        $product->setId("1");

        $this->productRepository->method('findById')
            ->willReturn($product);

        $this->productService->delete("1");
        self::assertTrue(true, 'delete success');
    }

    public function testStubDeleteFail()
    {
        self::expectException(\Exception::class);
        $this->productRepository->method('findById')
            ->willReturn(null);

        $this->productService->delete("1");
    }
}
