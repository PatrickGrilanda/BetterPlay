<?php

namespace BetterPlay\UseCase\DTO\CastMember\CreateCastMember;

class CastMemberCreateOutputDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public int $type,
        public string $created_at,
    ) {
    }
}
