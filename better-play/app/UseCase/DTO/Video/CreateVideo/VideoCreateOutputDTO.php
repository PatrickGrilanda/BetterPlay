<?php

namespace BetterPlay\UseCase\DTO\Video\CreateVideo;

use BetterPlay\Domain\Enum\Censure;

class VideoCreateOutputDTO
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public int $yearLaunched,
        public int $duration,
        public bool $opened,
        public int  $rating,
        public Censure $censure,
        public bool $published,
        public array $categories = [],
        public array $genres = [],
        public array $castMembers = [],
        public array $comments = [],
        public string $created_at,
    ) {
    }
}
