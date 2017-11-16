<?php

namespace App\Form;


/**
 * Class FormAdd
 * @package App\Form
 */
class FormAdd
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
        echo '<label>'.$label.'<input type="'.$type.'" name="'.$name.'" class="'.$class.'" /></label>';
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
        echo '<button type="submit" class="'.$class.'">Poster</button>';
    }

    /**
     *
     */
    public function end()
    {
        echo '</form>';
    }
}
