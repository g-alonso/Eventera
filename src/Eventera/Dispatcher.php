<?php

/**
 * This class contains the Dispatcher Class
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
 * Dispatcher
 *  
 * @package    Eventera
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Eventera
 *
 */
class Dispatcher
{
    /**    
     * @var array $listeners listeners
    */
    private $listeners = array();    

    /**
    * Add Listener
    *
    * @param string $listenerCode event code
    * @param mixed  $listener     listener
    * 
    * @return void
    */
    public function addListener($eventCode, $listener)
    {
        $this->listeners[$eventCode][] = $listener; 
    }

    /**
    * Dispatch
    *
    * @param string $eventCode eventCode
    * @param Event  $event     event
    *
    * @return void
    */
    public function dispatch($eventCode, Event $event=null)
    {

        if(!isset($this->listeners[$eventCode])){
            return $event;
        }

        if (null === $event) {
            $event = new Event();
        }

        foreach ($this->listeners[$eventCode] as $listener) {

            call_user_func($listener, $event);

            if ($event->isPropagationStopped()) {
                break;
            }
        }
    }
}