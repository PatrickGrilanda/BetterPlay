<?php

namespace BetterPlay\UseCase\DTO\CastMember\DeleteCastMember;

class DeleteCastMemberOutputDTO
{
    public function __construct(
        public bool $success
    ) {
    }
}
