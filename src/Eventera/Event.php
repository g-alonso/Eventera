<?php

/**
 * This class contains the Event Class
 *
 * PHP version 5.3+
 * 
 * @package    Eventera
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Eventera
 *
 */

namespace Eventera;

/**
 * Event
 *  
 * @package    Eventera
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Eventera
 *
 */
class Event
{
    /**
     * @var bool 
     */
    private $propagationStopped = false;

    /**
     * Is propagation stopped?
     *
     * @return bool
     */
    public function isPropagationStopped()
    {
        return $this->propagationStopped;
    }

    /**
     * Stop event propagation
     *
     * @return void
     */
    public function stopPropagation()
    {
        $this->propagationStopped = true;
    }
}