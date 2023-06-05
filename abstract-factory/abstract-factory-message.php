<?php
interface Message
{
    public function Send(string $msg);
}

class AliYunMessage implements Message
{
    public function Send(string $msg)
    {
        return '阿里云短信发送成功：' . $msg;
    }
}

class BaiduMessage implements Message
{
    public function Send(string $msg)
    {
        return '百度SMS短信发送成功:' . $msg;
    }
}

class JiguangMessage implements Messllage
{

    public function Send(string $msg)
    {
        return '极光短信发送成功:' . $msg;
    }
}

interface Push
{
    public function send(string $msg);
}

class AliYunPush implements Push
{
    public function send(string $msg)
    {
        return '阿里云Android&iOS推送发送成功！推送内容：' . $msg;
    }
}

class BaiduPush implements Push
{
    public function send(string $msg)
    {
        return '百度Android&iOS云推送发送成功！推送内容：' . $msg;
    }
}

class JiguangPush implements Push
{
    public function send(string $msg)
    {
        return '极光推送发送成功！推送内容：' . $msg;
    }
}

interface MessageFactory
{
    public function createMessage();
    public function createPush();
}

class AliYunFactory implements MessageFactory
{
    public function createMessage()
    {
        return new AliYunMessage();
    }
    public function createPush()
    {
        return new AliYunPush();
    }
}

class BaiduFactory implements MessageFactory
{
    public function createMessage()
    {
        return new BaiduMessage();
    }

    public function createPush()
    {
        return new BaiduPush();
    }
}

class JiguangFactory implements MessageFactory
{
    public function createMessage()
    {
        return new JiguangMessage();
    }
    public function createPush()
    {
        return new JiguangPush();
    }
}

// 当前业务使用阿里云

$factory = new AliYunFactory();
$message = $factory->createMessage();
$push = $factory->createPush();
echo $message->send('您已经很久没有登录过系统了，记得回来哦！');
echo $push->send('您有新的红包已到帐，请查收！');
