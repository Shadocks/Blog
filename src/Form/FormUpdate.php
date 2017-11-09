<?php

namespace App\Form;


/**
 * Class FormUpdate
 * @package App\Form
 */
class FormUpdate
{
    /**
     * @param string $action
     * @param string $method
     */
    public function start(
        string $action,
        string $method
    )    {
        echo '<form action="'.$action.'" method="'.$method.'">';
    }

    /**
     * @param string $label
     * @param string $type
     * @param string $name
     * @param string $value
     */
    public function inputType(
        string $label,
        string $type,
        string $name,
        string $value = ''
    ) {
        echo '<label>'.$label.'<input type="'.$type.'" name="'.$name.'" value="'.$value.'" /></label>';
    }

    /**
     * @param string $label
     * @param string $name
     * @param int $rows
     * @param int $cols
     * @param string $value
     */
    public function textArea(
        string $label,
        string $name,
        int $rows,
        int $cols,
        string $value = ''
    ) {
        echo '<label>'.$label.'<textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'">'.$value.'</textarea></label>';
    }

    /**
     *
     */
    public function submit()
    {
        echo '<button type="submit">Modifier</button>';
    }

    /**
     *
     */
    public function end()
    {
        echo '</form>';
    }
}
