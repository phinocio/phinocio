<?php

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);


it('returns a successful response', function () {
    get(route("posts.index"))->assertOk();
});

it('shows only published posts', function () {
    /** @var Post $published */
    $published = Post::factory()->published()->create();
    /** @var Post $unpublished */
    $unpublished = Post::factory()->create();

    get(route('posts.index'))
        ->assertSee([$published->title])
        ->assertDontSee([$unpublished->title]);
});

it('shows the most recently published post first', function () {
    /** @var Post $older */
    $older = Post::factory()->published(Carbon::yesterday())->create();
    /** @var Post $newer */
    $newer = Post::factory()->published(Carbon::now())->create();

    get(route('posts.index'))
        ->assertSeeInOrder([$newer->title, $older->title]);
});

it('only allows an admin to create a thought', function () {
    $user = User::factory()->create();
    $admin = User::factory()->admin()->create();
    $attributes = [
        'title' => fake()->name(),
        'summary' => fake()->name(),
        'content' => fake()->text(),
        'categories' => fake()->name(),
        'publish' => "on"
    ];
    actingAs($user)->post(route('posts.store'), $attributes)->assertForbidden();
    assertDatabaseMissing('posts', ['title' => $attributes['title']]);

    actingAs($admin)->post(route('posts.store'), $attributes)->assertRedirect();
    assertDatabaseHas('posts', ['title' => $attributes['title']]);
});
