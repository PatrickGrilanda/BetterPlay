<?php

namespace BetterPlay\UseCase\DTO\Video\CreateVideo;

use BetterPlay\Domain\Enum\Censure;

class VideoCreateInputDTO
{
    public function __construct(
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
        public array $comments = []
    ) {
    }
}
