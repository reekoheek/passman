<?php

namespace PassMan\Schema;

use Norm\Schema\String;
use PassMan\Type\CryptedString;

class Pass extends String
{
    public function prepare($value)
    {
        $value = new CryptedString($value);
        return $value;
    }

    public function formatInput($value, $entry = null)
    {
        $id = uniqid('generate-');
        $html = '<div style="display: flex">'.parent::formatInput($value, $entry);
        if (!$this['readonly']) {
            $html .= '
                <a href="#" id="'.$id.'" style="padding-right: 10px">Generate</a>
                <script>
                    var el = document.getElementById("'.$id.'");
                    el.addEventListener("click", function(evt) {
                        evt.preventDefault();
                        el.previousElementSibling.value = Math.random().toString(36).substr(2, 8);
                    });
                </script>
                ';
        }
        return $html.'</div>';
    }
}
