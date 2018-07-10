<?php

namespace Tests\Unit;

use App\Models\Tag;
use App\Models\Video;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;

class ModelVideoTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function nombre_de_Videos()
    {
        $this->assertEquals(0, Video::count());

        $video1 = Video::create([
            'title' => "titre de la 1ere vidéo",
            'description' => 'description de la première vidéo',
            'duration' => 3600,
            'teaser_file' => 'teaser-video_01.mpg',
            'video_file' => 'video_01.mpg',
        ]);

        $this->assertEquals(1, Video::count());
    }

    /**
     * @test
     */
    public function liaison_tag_video()
    {
        $tag1 = Tag::create(['name' => 'tag 1']);
        $tag2 = Tag::create(['name' => 'tag 2']);
        $tag3 = Tag::create(['name' => 'tag 3']);

        $video1 = Video::create([
            'title' => "titre de la 1ere vidéo",
            'description' => 'description de la première vidéo',
            'duration' => 3600,
            'teaser_file' => 'teaser-video_02.mpg',
            'video_file' => 'video_02.mpg',
        ]);

        // test nombre d'occurences
        $this->assertEquals(3, Tag::count());
        $this->assertEquals(1, Video::count());

        // test insertion de tags
        $this->assertEquals(0, $video1->tags()->count());
        $video1->tags()->sync([$tag1->id, $tag3->id]);
        $this->assertEquals(2, $video1->tags()->count());

        // test suppression de tag
        $tag_a_suppr = $video1->tags()->where('name', 'tag 1')->first();
        $video1->tags()->detach($tag_a_suppr->id);
        $this->assertEquals(1, $video1->tags()->count());
    }

    /**
     * @test
     */
    public function integrite_liaison_tag_video(){
        $tag1 = Tag::create(['name' => 'tag 1']);
        $tag2 = Tag::create(['name' => 'tag 2']);
        $video1 = Video::create([
            'title' => "titre de la 1ere vidéo",
            'description' => 'description de la première vidéo',
            'duration' => 3600,
            'teaser_file' => 'teaser-video_02.mpg',
            'video_file' => 'video_02.mpg',
        ]);

        $this->assertEquals(2, Tag::count());
        $this->assertEquals(1, Video::count());

        // ajout relation
        $this->assertEquals(0, $video1->tags()->count());
        $video1->tags()->sync([$tag1->id]);
        $this->assertEquals(1, $video1->tags()->count());

        //$this->expectException(QueryException::class);
        //$this->expectExceptionCode(23000);

        // suppression tag lié à vidéo
        $tag1->delete();
        $this->assertEquals(1, Video::count());
        $this->assertEquals(1, Tag::count());
    }

    /**
     * @test
     */
    public function integrite_suppression_video(){
        $tag1 = Tag::create(['name' => 'tag 1']);
        $video1 = Video::create([
            'title' => "titre de la 1ere vidéo",
            'description' => 'description de la première vidéo',
            'duration' => 3600,
            'teaser_file' => 'teaser-video_02.mpg',
            'video_file' => 'video_02.mpg',
        ]);

        // suppression vidéo lié à tag
        $video1->tags()->sync([$tag1->id]);
        $this->assertEquals(1, $video1->tags()->count());
        $video1->delete();
        $this->assertEquals(0, Video::count());
        $this->assertEquals(1, Tag::count());
    }

    /**
     * @test
     */
    public function integrite_modification_tags() {
        $tag1 = Tag::create(['name' => 'tag 1']);
        $video1 = Video::create([
            'title' => "titre de la 1ere vidéo",
            'description' => 'description de la première vidéo',
            'duration' => 3600,
            'teaser_file' => 'teaser-video_02.mpg',
            'video_file' => 'video_02.mpg',
        ]);

        $video1->tags()->sync([$tag1->id]);
        $this->assertEquals(1, $video1->tags()->count());
        $tag1->update(['name' => 'tag modifié']);
        $this->assertEquals(1, $video1->tags()->count());

    }
}
