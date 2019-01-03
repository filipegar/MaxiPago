<?php

namespace Filipegar\Maxipago\Gateway\Traits;

trait StringFormatter
{
    public function formatClassName($className)
    {
        $renameClass = [
            "VoidCapture" => "Void",
            "ReturnSale" => "Return"
        ];

        $str = str_replace("\\", "", strrchr(get_class($className), '\\'));
        if (array_key_exists($str, $renameClass)) {
            $str = $renameClass[$str];
        }

        return lcfirst($str);
    }

    public function formatResponseFieldSetter($field)
    {
        return "set" . str_replace(" ", "", ucwords(str_replace("-", " ", $field)));
    }
}
