<?php

namespace Tests\BetterPlay\Unit\UseCase\CastMember;

use BetterPlay\Domain\Entity\CastMember as EntityCastMember;
use BetterPlay\Domain\Enum\CastMemberType;
use BetterPlay\Domain\Repository\CastMemberRepositoryInterface;
use BetterPlay\Domain\ValueObject\Uuid;
use BetterPlay\UseCase\CastMember\CreateCastMemberUseCase;
use BetterPlay\UseCase\DTO\CastMember\CreateCastMember\CastMemberCreateInputDTO;
use BetterPlay\UseCase\DTO\CastMember\CreateCastMember\CastMemberCreateOutputDTO;
use Mockery;
use stdClass;
use Tests\TestCase;

class CreateCastMemberUseCaseTest extends TestCase
{
    public function test_CreateNewCastMember()
    {
        $uuid = (string) Uuid::random();
        $mockEntity = Mockery::mock(EntityCastMember::class, [$uuid, 'name', CastMemberType::ACTOR]);
        $mockEntity->shouldReceive('id')->andReturn($uuid);
        $mockEntity->shouldReceive('createdAt')->andReturn(date('Y-m-d H:i:s'));

        $mockRepository = Mockery::mock(stdClass::class, CastMemberRepositoryInterface::class);

        $mockRepository->shouldReceive('insert')->once()->andReturn($mockEntity);
        $useCase = new CreateCastMemberUseCase($mockRepository);

        $mockDto = Mockery::mock(CastMemberCreateInputDTO::class, ['name', 2]);

        $responseUseCase = $useCase->execute($mockDto);

        $this->assertInstanceOf(CastMemberCreateOutputDTO::class, $responseUseCase);
        $this->assertNotEmpty($responseUseCase->id);
        $this->assertEquals('name', $responseUseCase->name);
        $this->assertEquals(2, $responseUseCase->type);
        $this->assertNotEmpty($responseUseCase->created_at);
    }
}
