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
        //Create entity
        $entity = $this->createEntity($input);


        //Entity persiste
        $newEntity = $this->repository->insert($entity);


        //Storage media content
        //$this->storageFiles($input);
        //$this->repository->updateMedia($input);

        //Dispatch event manager to media processed



        return new VideoCreateOutputDTO(
            id: $newEntity->id(),
            title: $newEntity->title,
            description: $newEntity->description,
            yearLaunched: $newEntity->yearLaunched,
            duration: $newEntity->duration,
            opened: $newEntity->opened,
            rating: $newEntity->rating,
            censure: $newEntity->censure,
            published: $newEntity->published,
            categories: $newEntity->categoriesId,
            genres: $newEntity->genresId,
            castMembers: $newEntity->castMemberIds,
            comments: $newEntity->commentsId,
            created_at: $newEntity->createdAt(),
        );
    }

    private function createEntity(VideoCreateInputDTO $input)
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

        //Add categories_id in entity
        foreach ($input->categories as $categoryId) {
            $entity->addCategoryId(
                categoryId: $categoryId,
            );
        }

        //Add genres_id in entity
        foreach ($input->genres as $genreId) {
            $entity->addGenreId(
                genreId: $genreId,
            );
        }

        //Add cast_members_id in entity
        foreach ($input->castMembers as $castMemberId) {
            $entity->addCastMemberId(
                castMemberId: $castMemberId,
            );
        }

        //Add comments_id in entity
        foreach ($input->comments as $commentId) {
            $entity->addCommentId(
                commentId: $commentId,
            );
        }

        return $entity;
    }
}
