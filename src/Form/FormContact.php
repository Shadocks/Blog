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
     * @param string $text
     */
    public function legend(string $text)
    {
        echo '<legend>'.$text.'</legend>';
    }

    /**
     * @param string $label
     * @param string $type
     * @param string $name
     * @param string $class
     */
    public function inputType(
        string $label,
        string $type,
        string $name,
        string $class
    ) {
        echo '<label>'.$label.'<input type="'.$type.'" name="'.$name.'" class="'.$class.'" required /></label>';
    }

    /**
     * @param string $label
     * @param string $name
     * @param string $class
     */
    public function textArea(
        string $label,
        string $name,
        string $class
    ) {
        echo '<label>'.$label.'<textarea name="'.$name.'" class="'.$class.'"></textarea></label>';
    }

    /**
     * @param string $class
     */
    public function submit(string $class)
    {
        echo '<button type="submit" class="'.$class.'" >Envoyer</button>';
    }

    /**
     *
     */
    public function end()
    {
        echo '</form>';
    }
}
