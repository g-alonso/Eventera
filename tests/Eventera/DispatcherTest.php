<?php

/**
 * This class contains the Dispatcher Test Class
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
 * Dispatcher Test
 *  
 * @package    Eventera
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Eventera
 *
 */
class DispatcherTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    protected function setUp()
    {
        parent::setUp();

        $this->dispatcher = new Dispatcher();        
    }

    public function testDispatchClosure()
    {
    	$that = $this;
    	
        $this->dispatcher->addListener('test.run', function (Event $event)  use ($that) {

            $that->assertEquals("NJFHF2012", $event->getEventData());

        });

        $this->dispatcher->dispatch('test.run', new MyEvent);
    }
}

class MyEvent extends Event
{
    protected $eventData;

    public function __construct()
    {
        $this->eventData = "NJFHF2012";
    }

    public function getEventData()
    {
        return $this->eventData;
    }
}