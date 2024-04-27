<?php

namespace App\Modules\Common\Application\Utils;

use Illuminate\Support\Facades\Log;

class ExceptionHandler
{

    static public function format(\Throwable $th)
    {
        $code = $th->getCode();
        $message = $th->getMessage();

        if (!is_numeric($code) || ($code < 100 || $code > 599)) {
            $code = 500;
        }

        Log::warning("
        code: $code\n
        message: $message
        ");

        return [
            'code' => $code,
            'message' => $message
        ];
    }
}
