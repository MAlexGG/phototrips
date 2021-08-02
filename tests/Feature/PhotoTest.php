<?php

namespace Tests\Feature;

use App\Models\Photo;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhotoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function test_if_a_photo_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/store', [
            'title' => 'La Alhambra sunset',
            'description' => 'Beatiful sunset',
            'photo' => 'Image of sunset',
            'continent' => 'Europe',
            'country' => 'Spain',
            'date' => 1987-04-24,
        ]);

        $response->assertOk();
        $this->assertCount(1, Photo::all());

        $photo = Photo::first();
        $this->assertEquals($photo->title, 'La Alhambra sunset');
        $this->assertEquals($photo->description, 'Beatiful sunset');
        $this->assertEquals($photo->photo, 'Image of sunset');
        $this->assertEquals($photo->continent, 'Europe');
        $this->assertEquals($photo->country, 'Spain');
        $this->assertEquals($photo->date, 1987 - 04 - 24);
    }

    public function test_if_photos_can_be_listed()
    {
        $this->withoutExceptionHandling();

        Photo::factory(3)->create();

        $response = $this->get('/photos');

        $photos = Photo::all();

        $response->assertOk();
        $response->assertViewIs('photos.index');
        $response->assertViewHas('photos', $photos);
    }
}
