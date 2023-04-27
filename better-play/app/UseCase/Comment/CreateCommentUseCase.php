<?php

namespace BetterPlay\UseCase\Comment;

use BetterPlay\Domain\Entity\Comment;
use BetterPlay\Domain\Repository\CommentRepositoryInterface;
use BetterPlay\UseCase\DTO\Comment\CreateComment\CommentCreateInputDTO;
use BetterPlay\UseCase\DTO\Comment\CreateComment\CommentCreateOutputDTO;

class CreateCommentUseCase
{

    protected $repository;


    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CommentCreateInputDTO $input): CommentCreateOutputDTO
    {
        $entity = new Comment(
            description: $input->description,
            isActive: $input->isActive,

        );

        $newEntity = $this->repository->insert($entity);

        return new CommentCreateOutputDTO(
            id: $newEntity->id(),
            description: $newEntity->description,
            is_active: $newEntity->isActive,
            created_at: $newEntity->createdAt(),
        );
    }
}
