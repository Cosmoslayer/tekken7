<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CharactersTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_create_characters()
    {
        $character = factory('App\Character')->create();

        $this->get('/characters/create')->assertRedirect('login');
        $this->post('/characters', $character->toArray())->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_character()
    {
        $this->withoutExceptionHandling();

        Storage::fake('images');

        $this->actingAs(factory('App\User')->create());

        $this->get('/characters/create')->assertStatus(200);

        $attributes = [
            'name' => $this->faker->sentence,
            'fighting_style' => $this->faker->jobTitle,
            'nationality' => $this->faker->country,
            'background' => $this->faker->paragraph,
            'picture' => UploadedFile::fake()->image('test.jpg'),
            'notes' => $this->faker->paragraph
        ];

        $this->post('/characters', $attributes)->assertRedirect('/characters');

        $getImageName = time().'.'.$attributes['picture']->getClientOriginalExtension();

        $attributes['picture'] = $getImageName;

        $this->assertDatabaseHas('characters', $attributes);

        $this->get('/characters')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_can_view_a_character()
    {
        $this->withoutExceptionHandling();

        $character = factory('App\Character')->create();

        $this->get($character->path())
            ->assertSee($character->name)
            ->assertSee($character->fighting_style)
            ->assertSee($character->nationality)
            ->assertSee($character->background)
            ->assertSee($character->picture)
            ->assertSee($character->notes);
    }

    /** @test */
    public function a_character_requires_a_name()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Character')->raw(['name' => '']);

        $this->post('/characters', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_character_requires_a_fighting_style()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Character')->raw(['fighting_style' => '']);

        $this->post('/characters', $attributes)->assertSessionHasErrors('fighting_style');
    }

    /** @test */
    public function a_character_requires_a_nationality()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Character')->raw(['nationality' => '']);

        $this->post('/characters', $attributes)->assertSessionHasErrors('nationality');
    }

    /** @test */
    public function a_character_requires_a_picture()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Character')->raw(['picture' => '']);

        $this->post('/characters', $attributes)->assertSessionHasErrors('picture');
    }

    /** @test */
    public function a_character_requires_a_background()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Character')->raw(['background' => '']);

        $this->post('/characters', $attributes)->assertSessionHasErrors('background');
    }
}
