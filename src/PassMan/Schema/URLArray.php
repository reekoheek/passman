<?php

namespace PassMan\Schema;

use \Norm\Schema\NormArray;

class URLArray extends NormArray
{
    public function prepare($value)
    {

        if (is_string($value)) {
            $v = json_decode($value);
            if (is_null($v)) {
                $v1 = explode("\n", $value);
                if (count($v1) > 1) {
                    $v = array();
                    foreach ($v1 as $v11) {
                        $v11 = trim($v11);
                        if (empty($v11)) {
                            continue;
                        }

                        $v[] = $v11;
                    }
                } else {
                    $v = array($value);
                }
            }
        } else {
            $v = $value;
        }

        $value = array();
        foreach ($v as $k => $v1) {
            $value[$v1] = null;
        }

        return parent::prepare(array_keys($value));
    }

    public function formatReadonly($value, $entry = null)
    {
        if (!empty($value)) {
            if (!is_array($value)) {
                $value = $value->toArray();
            }
            $value = implode("<br>\n", $value);
        }
        return '<span class="field">'.$value.'</span>';
    }

    public function formatInput($value, $entry = null)
    {
        if (!empty($value)) {
            if (!is_array($value)) {
                $value = $value->toArray();
            }
            $value = implode("\n", $value);
        }
        return '<textarea name="'.$this['name'].'">'.$value.'</textarea>';
    }
}
