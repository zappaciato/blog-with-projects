<?php
//debuggin class: logs errors/varibales into logs.txt / Used only during development debugging
class Logs
{
    private const FILEPATH = "../logs.txt";

    public static function getDateTime() {
        $dateTime = new DateTime();
        
        return $dateTime->format('m/d/Y g:i A') . PHP_EOL;
    }

    public static function printLog($e) {

        file_put_contents(self::FILEPATH, "Your log at @ " . self::getDateTime() . '// ' . "log value: " . json_encode($e) . "\n", FILE_APPEND);
}
}
