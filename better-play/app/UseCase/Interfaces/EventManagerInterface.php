<?php

namespace BetterPlay\UseCase\Interfaces;

interface EventManagerInterface
{
    public function dispatch(object $event): void;
}
