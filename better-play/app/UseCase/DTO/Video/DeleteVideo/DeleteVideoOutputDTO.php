<?php

namespace BetterPlay\UseCase\DTO\Video\DeleteVideo;

class DeleteVideoOutputDTO
{
    public function __construct(
        public bool $success
    ) {
    }
}
