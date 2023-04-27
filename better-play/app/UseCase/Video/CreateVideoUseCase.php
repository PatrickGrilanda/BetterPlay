<?php

namespace BetterPlay\UseCase\Video;

use BetterPlay\Domain\Entity\Video;
use BetterPlay\Domain\Enum\Censure;
use BetterPlay\Domain\Repository\VideoRepositoryInterface;
use BetterPlay\UseCase\DTO\Video\CreateVideo\VideoCreateInputDTO;
use BetterPlay\UseCase\DTO\Video\CreateVideo\VideoCreateOutputDTO;

class CreateVideoUseCase
{

    protected $repository;


    public function __construct(VideoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(VideoCreateInputDTO $input): VideoCreateOutputDTO
    {
        $entity = new Video(
            title: $input->title,
            description: $input->description,
            yearLaunched: $input->yearLaunched,
            duration: $input->duration,
            opened: $input->opened,
            rating: $input->rating,
            censure: $input->censure,
            published: $input->published,

        );

        $newEntity = $this->repository->insert($entity);

        return new VideoCreateOutputDTO(
            id: $newEntity->id(),
            title: $newEntity->title,
            description: $newEntity->description,
            yearLaunched: $newEntity->yearLaunched,
            duration: $newEntity->duration,
            opened: $newEntity->opened,
            rating: $newEntity->rating,
            censure: $newEntity->censure->value,
            published: $newEntity->published,
            created_at: $newEntity->createdAt(),
        );
    }
}
