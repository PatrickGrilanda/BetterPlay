<?php

namespace BetterPlay\UseCase\DTO\CastMember\CreateCastMember;

class CastMemberCreateInputDTO
{
    public function __construct(
        public string $name,
        public int $type,
    ) {
    }
}
