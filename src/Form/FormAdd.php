<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 27/09/2017
 * Time: 13:53
 */

namespace App\Form;


class FormAdd
{
    public function start(string $action, string $method)
    {
        echo '<form action="'.$action.'" method="'.$method.'">';
    }

    public function inputType(string $type, string $labelText, string $forId)
    {
        echo '<label for="' . $forId . '">' . $labelText . '</label><input type="'.$type.'" id="'.$forId.'" />';
    }

    public function textArea(string $labelText, string $forId, int $rows, int $cols)
    {
        echo '<label for="' . $forId . '">'. $labelText .'</label><textarea rows="'.$rows.'" cols="'.$cols.'" id="'.$forId.'"></textarea>';
    }

    public function submit()
    {
        echo '<button type="submit">Poster</button>';
    }

    public function end()
    {
        echo '</form>';
    }
}