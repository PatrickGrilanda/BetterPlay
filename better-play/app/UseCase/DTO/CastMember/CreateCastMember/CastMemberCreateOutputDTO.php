<?php

namespace BetterPlay\UseCase\DTO\CastMember\CreateCastMember;

use BetterPlay\Domain\Enum\CastMemberType;

class CastMemberCreateOutputDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public CastMemberType $type,
        public string $created_at,
    ) {
    }
}
