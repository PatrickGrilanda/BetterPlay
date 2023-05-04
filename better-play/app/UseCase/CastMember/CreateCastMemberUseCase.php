<?php

namespace BetterPlay\UseCase\CastMember;

use BetterPlay\Domain\Entity\CastMember;
use BetterPlay\Domain\Enum\CastMemberType;
use BetterPlay\Domain\Repository\CastMemberRepositoryInterface;
use BetterPlay\UseCase\DTO\CastMember\CreateCastMember\CastMemberCreateInputDTO;
use BetterPlay\UseCase\DTO\CastMember\CreateCastMember\CastMemberCreateOutputDTO;

class CreateCastMemberUseCase
{

    protected $repository;


    public function __construct(CastMemberRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CastMemberCreateInputDTO $input): CastMemberCreateOutputDTO
    {
        $entity = new CastMember(
            name: $input->name,
            type: $input->type

        );

        $newEntity = $this->repository->insert($entity);

        return new CastMemberCreateOutputDTO(
            id: $newEntity->id(),
            name: $newEntity->name,
            type: $input->type,
            created_at: $newEntity->createdAt(),
        );
    }
}
