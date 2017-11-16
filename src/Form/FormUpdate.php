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
     * @param string $value
     */
    public function inputType(
        string $label,
        string $type,
        string $name,
        string $class,
        string $value = ''
    ) {
        echo '<label>'.$label.'<input type="'.$type.'" name="'.$name.'" class="'.$class.'" value="'.$value.'" /></label>';
    }

    /**
     * @param string $label
     * @param string $name
     * @param string $class
     * @param string $value
     */
    public function textArea(
        string $label,
        string $name,
        string $class,
        string $value = ''
    ) {
        echo '<label>'.$label.'<textarea name="'.$name.'" class="'.$class.'" >'.$value.'</textarea></label>';
    }

    /**
     * @param string $class
     */
    public function submit(string $class)
    {
        echo '<button type="submit" name="submit" class="'.$class.'">Modifier</button>';
    }

    /**
     *
     */
    public function end()
    {
        echo '</form>';
    }
}
