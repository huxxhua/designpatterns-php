<?php
# 简单工厂实例
# 场景：短信发送功能模块
interface Message
{
    public function send(string $msg);
}

class AliYunMessage implements Message
{
    public function send(string $msg)
    {
        echo '阿里云发送成功！短信内容：' . $msg;
    }
}

class BaiduYunMessage implements Message
{
    public function send(string $msg)
    {
        echo '百度云发送成功！短信内容：' . $msg;
    }
}

class JiguangMessage implements Message
{

    public function send(string $msg)
    {
        echo '极光短信发送成功！短信内容：' . $msg;
    }
}

class MessageFactory
{
    # 当需要新增发送渠道，就要修改这方法 违背面向对象的开放封闭原则
    public static function createFactroy($type)
    {
        switch ($type) {
            case 'Ali':
                return new AliYunMessage();
                break;
            case 'Baidu':
                return new BaiduYunMessage();
                break;
            case 'Jiguang':
                return new JiguangMessage();
                break;
            default:
                return null;
                break;
        }
    }
}

# 实例中如果传错了type怎么办？
# 返回默认 或者上层捕获
$message = MessageFactory::createFactroy('Baidu');
$message->send('通知缴费');

