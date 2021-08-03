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

        $response = $this->post('/photos/store', [
            'title' => 'La Alhambra sunset',
            'description' => 'Beatiful sunset',
            'photo' => 'Image of sunset',
            'continent' => 'Europe',
            'country' => 'Spain',
            'date' => 1987-04-24,
        ]);

        $this->assertCount(1, Photo::all());

        $photo = Photo::first();
        $this->assertEquals($photo->title, 'La Alhambra sunset');
        $this->assertEquals($photo->description, 'Beatiful sunset');
        $this->assertEquals($photo->photo, 'Image of sunset');
        $this->assertEquals($photo->continent, 'Europe');
        $this->assertEquals($photo->country, 'Spain');
        $this->assertEquals($photo->date, 1987 - 04 - 24);

        $response->assertRedirect('/photos/' . $photo->id);
    }

    public function test_if_title_is_required()
    {
        $response = $this->post('/photos/store', [
            'title' => '',
            'description' => 'Beatiful sunset',
            'photo' => 'Image of sunset',
            'continent' => 'Europe',
            'country' => 'Spain',
            'date' => 1987 - 04 - 24,
        ]);

        $response->assertSessionHasErrors(['title']);
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

    public function test_if_a_photo_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $photo = Photo::factory()->create();

        $response = $this->get('/photos/' . $photo->id);

        $photo = Photo::first();

        $response->assertOk();
        $response->assertViewIs('photos.show');
        $response->assertViewHas('photo', $photo);
    }

    public function test_if_a_photo_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $photo = Photo::factory()->create();

        $response = $this->put('/photos/' . $photo->id, [
            'title' => 'La Alhambra sunset',
            'description' => 'Beatiful sunset',
            'photo' => 'Image of sunset',
            'continent' => 'Europe',
            'country' => 'Spain',
            'date' => 1987 - 04 - 24,
        ]);

        $this->assertCount(1, Photo::all());

        $photo = $photo->fresh();

        $this->assertEquals($photo->title, 'La Alhambra sunset');
        $this->assertEquals($photo->description, 'Beatiful sunset');
        $this->assertEquals($photo->photo, 'Image of sunset');
        $this->assertEquals($photo->continent, 'Europe');
        $this->assertEquals($photo->country, 'Spain');
        $this->assertEquals($photo->date, 1987 - 04 - 24);

        $response->assertRedirect('/photos/' . $photo->id);
    }

    public function test_if_a_photo_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $photo = Photo::factory()->create();

        $response = $this->delete('/photos/' . $photo->id);

        $this->assertCount(0, Photo::all());

        $response->assertRedirect('/photos');
    }
}
