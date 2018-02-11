<?php

namespace Core;

class Debug
{
    /**
     * @var array $debugs contain assoc array with debugs. Data keep in next format:
     *  $debugs = [
     *      ['mark', 'message']
     * ]
     */
    private static $listener = [];

    /**
     * Save message to listener
     * @param string $mark debug name
     * @param $message messege
     */
    public static function massage($mark = 'Debug.php', $message)
    {
        self::$listener[] = [
            'mark' => $mark,
            'message' => $message
        ];
    }

    public static function toScreen($mark = '')
    {
        foreach (self::$listener as $debug) {
            if ((!empty($mark) && $mark == $debug['mark']) || empty($mark)) {
                self::debugPrint($debug);
            }
        }
    }

    private static function debugPrint($debug)
    {
        echo $debug['mark'] . ' | ' . $debug['message'] . '<br>';
    }
}