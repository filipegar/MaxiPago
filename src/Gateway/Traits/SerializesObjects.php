<?php

namespace Filipegar\Maxipago\Gateway\Traits;

trait SerializesObjects
{
    private function objectToArray($data)
    {
        $properties = [];

        foreach ($data as $key => $value) {
            if (is_null($value)) {
                continue;
            }

            if (is_object($value)) {
                $properties[$key] = $this->objectToArray($value->getVariables());
            } else {
                $properties[$key] = $value;
            }
        }

        return $properties;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @param $data
     * @param mixed $superKey
     * @return \SimpleXMLElement
     */
    private function objectToXml(\SimpleXMLElement $xml, $data, $superKey = null)
    {
        foreach ($data as $key => $value) {
            if (is_null($value)) {
                continue;
            }

            $key = is_null($superKey) ? $key : $superKey;
            if (is_object($value)) {
                $newXml = $xml->addChild($key);
                $this->objectToXml($newXml, $value->getVariables());
            } elseif (is_array($value)) {
                $newXml = $xml->addChild($key);
                $this->objectToXml($newXml, $value, substr($key, 0, -1));
            } else {
                $xml->addChild($key, $value);
            }
        }

        return $xml;
    }
}
