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
    public function start(
        string $action,
        string $method
    ) {
        echo '<form action="'.$action.'" method="'.$method.'">';
    }

    public function inputType(
        string $label,
        string $type,
        string $name
    ) {
        echo '<label>'.$label.'<input type="'.$type.'" name="'.$name.'" /></label>';
    }

    public function textArea(
        string $label,
        string $name,
        int $rows,
        int $cols
    ) {
        echo '<label>'.$label.'<textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'"></textarea></label>';
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