<?php
/**
 * Created by PhpStorm.
 * User: gorchakovalexandr
 * Date: 06.09.2018
 * Time: 17:34
 */

namespace App;


/**
 * Class View
 * @package App
 *
 * @property array $articles
 */

//добавим стандартных интерфейсов
class View implements \Countable
{
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __isset($name)
    {
        //return false by default
        return isset($this->data[$name]);
    }

    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }

//     /**
//      * @deprecated
//      */
    public function render($template)
    {
        include $template;

        // or use
        // ob_start();
        // include $template;
        // $content = ob_get_contents();
        // ob_end_clean();
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count( $this->data );
    }
}