<?php
namespace app\common;
/**
 * Log.php
 * @Author: zhuangxiaofan
 * @Date: 2017/3/22
 * @Time: 15:55
 */
class Log
{

    private static $logDir = './logs/';

    public static function log($content, $data=[], $file='mylog.log')
    {

        $file = self::$logDir . $file;

        $f = fopen($file, 'a');
        fwrite($f, self::formatContent($content, $data));
        fclose($f);
    }


    private static function formatContent($content, $data)
    {
        $datetime = date('Y-m-d H:i:s');
        $str  = '[时　间]' . $datetime . PHP_EOL;
        $str .= '[内　容]' . $content . PHP_EOL;
        if (!empty($data)) $str .= '[上下文]' . json_encode($data) . PHP_EOL;
        $str .= PHP_EOL;

        return $str;
    }

}
