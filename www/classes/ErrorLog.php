<?php

namespace Application\Classes;

class ErrorLog
    extends \ErrorException
{
    public static function newMessage(
        \Exception $exception,
        $clear = false,
        $error_file = 'views/log.php'
    )
    {
        $message = $exception->getMessage();
        $code = $exception->getCode();
        $file = $exception->getFile();
        $line = $exception->getLine();
        $trace = $exception->getTraceAsString();
        $date = date('M d, Y h:iA');

        $log_message = "<h3>Информация об исключении:</h3>
         <p>
            <strong>Дата:</strong> {$date}
         </p>

         <p>
            <strong>Сообщение:</strong> {$message}
         </p>

         <p>
            <strong>Код:</strong> {$code}
         </p>

         <p>
            <strong>Файл:</strong> {$file}
         </p>

         <p>
            <strong>Строка:</strong> {$line}
         </p>

         <h3>Stack trace:</h3>
         <pre>{$trace}
         </pre>
         <br />
         <hr /><br /><br />";

        if (is_file($error_file) === false) {
            file_put_contents($error_file, '');
        }

        if ($clear) {
            $content = '';
        } else {
            $content = file_get_contents($error_file);
        }

        file_put_contents($error_file, $log_message . $content);
    }
}