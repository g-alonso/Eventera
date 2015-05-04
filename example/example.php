<?php

require_once "../src/Eventera/Dispatcher.php";
require_once "../src/Eventera/Event.php";

use Eventera\Dispatcher;
use Eventera\Event;

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

class MyListener{

    function listenerMethod(MyEvent $event){
        echo "Order N: ".$event->getEventData();
    }
}

$dispatcher = new Dispatcher();

$dispatcher->addListener('page.run', function (Event $event) {
    echo "From closure, Order N ".$event->getEventData();
    echo "<br />";
});
$dispatcher->addListener("page.run", array(new MyListener, "listenerMethod"));

$dispatcher->dispatch('page.run', new MyEvent);


