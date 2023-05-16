<?php
# 简单工厂
interface Product
{
    public function show();
}

class ProductA implements Product
{
    public function show()
    {
        echo 'ProductA';
    }
}

class ProductB implements Product
{
    public function show()
    {
        echo 'ProductB';
    }
}

class Factory
{
    public static function createFactory(string $type): Product
    {
        $product = null;
        switch ($type) {
            case 'A':
                $product = new ProductA();
                break;
            case 'B':
                $product = new ProductB();
                break;
        }
        return $product;
    }
}

$productA = Factory::createFactory('A');
$productA->show();
$productB = Factory::createFactory('B');
$productB->show();
