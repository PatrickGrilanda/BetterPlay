<?php

namespace Tests\BetterPlay\Unit\UseCase\Comment;

use BetterPlay\Domain\Entity\Comment as EntityComment;
use BetterPlay\Domain\Repository\CommentRepositoryInterface;
use BetterPlay\Domain\ValueObject\Uuid;
use BetterPlay\UseCase\Comment\CreateCommentUseCase;
use BetterPlay\UseCase\DTO\Comment\CreateComment\CommentCreateInputDTO;
use BetterPlay\UseCase\DTO\Comment\CreateComment\CommentCreateOutputDTO;
use Mockery;
use stdClass;
use Tests\TestCase;

class CreateCommentUseCaseTest extends TestCase
{
    public function test_CreateNewComment()
    {
        $uuid = (string) Uuid::random();
        $mockEntity = Mockery::mock(EntityComment::class, [$uuid, 'description']);
        $mockEntity->shouldReceive('id')->andReturn($uuid);
        $mockEntity->shouldReceive('createdAt')->andReturn(date('Y-m-d H:i:s'));

        $mockRepository = Mockery::mock(stdClass::class, CommentRepositoryInterface::class);

        $mockRepository->shouldReceive('insert')->once()->andReturn($mockEntity);
        $useCase = new CreateCommentUseCase($mockRepository);

        $mockDto = Mockery::mock(CommentCreateInputDTO::class, ['description']);

        $responseUseCase = $useCase->execute($mockDto);

        $this->assertInstanceOf(CommentCreateOutputDTO::class, $responseUseCase);
        $this->assertNotEmpty($responseUseCase->id);
        $this->assertEquals('description', $responseUseCase->description);
        $this->assertNotEmpty($responseUseCase->created_at);
    }
}
