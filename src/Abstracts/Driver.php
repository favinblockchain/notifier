<?php

namespace Favinblockchain\Notifier\Abstracts;

use Favinblockchain\Notifier\Contracts\DriverInterface;

abstract class Driver implements DriverInterface
{

    public $driver;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    abstract public function send($userId, $templateId, $params = [],  $options = []);

    public function getInformation() {
        return config('notifier.information')[$this->driver]['constructor'];
    }

    public function getUserModel()
    {
        $class = config('notifier.user_model');
        return new $class;
    }
}
