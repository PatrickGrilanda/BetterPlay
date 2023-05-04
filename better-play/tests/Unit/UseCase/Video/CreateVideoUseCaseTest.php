<?php

namespace Tests\BetterPlay\Unit\UseCase\Video;

use BetterPlay\Domain\Entity\Video as EntityVideo;
use BetterPlay\Domain\Enum\Censure;
use BetterPlay\Domain\Repository\CategoryRepositoryInterface;
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
            true
        ]);
        $mockEntity->shouldReceive('id')->andReturn($uuid);
        $mockEntity->shouldReceive('createdAt')->andReturn(date('Y-m-d H:i:s'));

        $mockRepository = Mockery::mock(stdClass::class, VideoRepositoryInterface::class);

        $mockRepository->shouldReceive('insert')->once()->andReturn($mockEntity);
        $useCase = new CreateVideoUseCase($mockRepository);


        $mockDto = $this->createMockInputDTO();

        $responseUseCase = $useCase->execute($mockDto);

        $this->assertInstanceOf(VideoCreateOutputDTO::class, $responseUseCase);
        $this->assertNotEmpty($responseUseCase->id);
        $this->assertEquals('title', $responseUseCase->title);
        $this->assertEquals('description', $responseUseCase->description);
        $this->assertEquals(2029, $responseUseCase->yearLaunched);
        $this->assertEquals(Censure::CENSURE18, $responseUseCase->censure);
        $this->assertCount(0, $responseUseCase->categories);
        $this->assertNotEmpty($responseUseCase->published);
        $this->assertNotEmpty($responseUseCase->created_at);
    }

    private function createMockInputDTO(
        array $categoriesIds = [],
        array $genresIds = [],
        array $castMemberIds = [],
        array $comments = []
    ) {
        return Mockery::mock(VideoCreateInputDTO::class, [
            'title',
            'description',
            2029,
            12,
            true,
            5,
            Censure::CENSURE18,
            true,
            $categoriesIds,
            $genresIds,
            $castMemberIds,
            $comments
        ]);
    }

    private function createMockRepositoryCategory()
    {
        $uuid1 = (string)Uuid::random();
        $uuid2 = (string)Uuid::random();
        $categoriesRenponse = [$uuid1, $uuid2];
        $mockRepository = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);

        $mockRepository->shouldReceive('getIdsListIds')->andReturn($categoriesRenponse);

        return $mockRepository;
    }
}
