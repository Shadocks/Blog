<?php

namespace App\Form;


/**
 * Class FormContact
 * @package App\Form
 */
class FormContact
{
    /**
     * @param string $action
     * @param string $method
     */
    public function start(
        string $action,
        string $method
    ) {
        echo '<form action="'.$action.'" method="'.$method.'">';
    }

    /**
     * @param string $label
     * @param string $type
     * @param string $name
     */
    public function inputType(
        string $label,
        string $type,
        string $name
    ) {
        echo '<label>'.$label.'<input type="'.$type.'" name="'.$name.'" /></label>';
    }

    /**
     * @param string $label
     * @param string $name
     * @param int $rows
     * @param int $cols
     */
    public function textArea(
        string $label,
        string $name,
        int $rows,
        int $cols
    ) {
        echo '<label>'.$label.'<textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'"></textarea></label>';
    }

    /**
     *
     */
    public function submit()
    {
        echo '<button type="submit">Envoyer</button>';
    }

    /**
     *
     */
    public function end()
    {
        echo '</form>';
    }
}
