<?php

namespace BetterPlay\UseCase\DTO\Comment\CreateComment;

class CommentCreateOutputDTO
{
    public function __construct(
        public string $id,
        public string $description = '',
        public bool $is_active = true,
        public string $created_at = '',
    ) {
    }
}
