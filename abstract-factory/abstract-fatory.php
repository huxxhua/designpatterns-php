<?php

// 商品A抽象接口
interface AbstractProductA
{
    public function show(): void;
}

// 商品A1实现
class ProductA1 implements AbstractProductA
{
    public function show(): void
    {
        echo 'ProductA1 is show' . PHP_EOL;
    }
}
// 商品A2实现
class ProductA2 implements AbstractProductA
{
    public function show(): void
    {
        echo 'ProductA2 is show' . PHP_EOL;
    }
}

// 商品B抽象接口
interface AbstructProductB
{
    public function show(): void;
}

// 商品B1实现
class ProductB1 implements AbstructProductB
{
    public function show(): void
    {
        echo 'ProductB1 is show' . PHP_EOL;
    }
}

// 商品B2实现
class ProductB2 implements AbstructProductB
{
    public function show(): void
    {
        echo 'ProductB2 is show' . PHP_EOL;
    }
}

// 假设有这样的关系，A1和B1是同类相关的商品，A2和B2是同类相关的商品

// 抽象工厂接口
interface AbstractFactory
{
    // 创建商品A
    public function CreateProductA(): AbstractProductA;
    // 创建商品B
    public function CreateProductB(): AbstructProductB;
}

// 工厂1 实现商品A1和商品B1
class ConcreteFactory1 implements AbstractFactory
{

    public function CreateProductA(): AbstractProductA
    {
        return new ProductA1;
    }

    public function CreateProductB(): AbstructProductB
    {
        return new ProductB1;
    }
}

// 工厂2 实现商品A2和商品B2
class ConcreteFactory2 implements AbstractFactory
{
    public function CreateProductA(): AbstractProductA
    {
        return new ProductA2;
    }

    public function CreateProductB(): AbstructProductB
    {
        return new ProductB2;
    }
}
