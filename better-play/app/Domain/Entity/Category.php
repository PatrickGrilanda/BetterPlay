<?php

use BetterPlay\Domain\Entity;


class Category
{

    use EntityTraits;

    public function __construct(
        protected string $id,
        protected string $name,
        protected string $description,
        protected bool $isActive = true
    ) {
    }
}
