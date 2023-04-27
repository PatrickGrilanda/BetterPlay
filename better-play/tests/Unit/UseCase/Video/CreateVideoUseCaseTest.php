<?php

namespace Tests\BetterPlay\Unit\UseCase\Video;

use BetterPlay\Domain\Entity\Video as EntityVideo;
use BetterPlay\Domain\Enum\Censure;
use BetterPlay\Domain\Repository\VideoRepositoryInterface;
use BetterPlay\Domain\ValueObject\Uuid;
use BetterPlay\UseCase\Video\CreateVideoUseCase;
use BetterPlay\UseCase\DTO\Video\CreateVideo\VideoCreateInputDTO;
use BetterPlay\UseCase\DTO\Video\CreateVideo\VideoCreateOutputDTO;
use Mockery;
use stdClass;
use Tests\TestCase;

class CreateVideoUseCaseTest extends TestCase
{
    public function test_CreateNewVideo()
    {
        $uuid = (string) Uuid::random();
        $mockEntity = Mockery::mock(EntityVideo::class, [
            $uuid,
            'title',
            'description',
            2029,
            12,
            true,
            5,
            Censure::CENSURE18,
            true,
        ]);
        $mockEntity->shouldReceive('id')->andReturn($uuid);
        $mockEntity->shouldReceive('createdAt')->andReturn(date('Y-m-d H:i:s'));

        $mockRepository = Mockery::mock(stdClass::class, VideoRepositoryInterface::class);

        $mockRepository->shouldReceive('insert')->once()->andReturn($mockEntity);
        $useCase = new CreateVideoUseCase($mockRepository);

        $mockDto = Mockery::mock(VideoCreateInputDTO::class, [
            'title',
            'description',
            2029,
            12,
            true,
            5,
            Censure::CENSURE18,
            true
        ]);

        $responseUseCase = $useCase->execute($mockDto);

        $this->assertInstanceOf(VideoCreateOutputDTO::class, $responseUseCase);
        $this->assertNotEmpty($responseUseCase->id);
        $this->assertEquals('title', $responseUseCase->title);
        $this->assertEquals('description', $responseUseCase->description);
        $this->assertNotEmpty($responseUseCase->created_at);
    }
}
