<?php

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('returns a successful response', function () {
    get(route("home"))->assertOk();
});

it('shows only published posts', function () {
    /** @var Post $published */
    $published = Post::factory()->published()->create();
    /** @var Post $unpublished */
    $unpublished = Post::factory()->create();

    get(route('home'))
        ->assertSee([$published->title])
        ->assertDontSee([$unpublished->title]);
});

it('shows the most recently published post first', function () {
    /** @var Post $older */
    $older = Post::factory()->published(Carbon::yesterday())->create();
    /** @var Post $newer */
    $newer = Post::factory()->published(Carbon::now())->create();

    get(route('home'))
        ->assertSeeInOrder([$newer->title, $older->title]);
});
