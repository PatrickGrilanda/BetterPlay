<?php

namespace BetterPlay\UseCase\Interfaces;

interface TransactionInterface
{
    public function commit();

    public function rollback();
}
