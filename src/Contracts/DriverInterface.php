<?php

namespace Favinblockchain\Notifier\Contracts;

interface DriverInterface
{
    public function send($userId, $templateId, $params = [],  $options = []);
}
