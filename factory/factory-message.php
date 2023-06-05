<?php

interface Message
{
    public function send(string $msg);
}

class AliYunMessage implements Message
{
    public function send(string $msg)
    {
        //调用接口 发送短信
        return '阿里云发送短信，内容是:' . $msg;
    }
}

class BaiduYunMessage implements Message
{
    public function send(string $msg)
    {
        return '百度云发送短信，内容是:' . $msg;
    }
}
class JiguangMessage implements Message
{
    public function send(string $msg)
    {
        return '极光短信发送短信，内容是:' . $msg;
    }
}

abstract class MessageFactory
{
    abstract protected function FactoryMethod();
    public function getMessage()
    {
        return $this->FactoryMethod();
    }
}

class AliYunFactory extends MessageFactory
{
    protected function factoryMethod()
    {
        return new AliYunMessage();
    }
}

class BaiduYunFactory extends MessageFactory
{
    protected function factoryMethod()
    {
        return new BaiduYunMessage();
    }
}

class JiguangFactory extends MessageFactory
{
    protected  function factoryMethod()
    {
        return new JiguangMessage();
    }
}

// 工厂方法模式的特点，实现推迟到了子类
$factory = new BaiduYunFactory;
$message = $factory->getMessage();
echo $message->send('您有新的短消息，请查收');
