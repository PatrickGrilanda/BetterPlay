<?php

namespace BetterPlay\UseCase\DTO\Video\CreateVideo;

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
        public string $censure,
        public bool $published,
        public string $created_at,
    ) {
    }
}
