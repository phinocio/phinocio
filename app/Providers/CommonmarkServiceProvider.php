<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\DefaultAttributes\DefaultAttributesExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\MarkdownConverter;

class CommonmarkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(MarkdownConverter::class, function () {
            // Configure the Environment with all the CommonMark parsers/renderers
            $environment = new Environment(config('commonmark'));
            $environment->addExtension(new CommonMarkCoreExtension());

            $environment->addExtension(new AttributesExtension());
            $environment->addExtension(new DefaultAttributesExtension());
            $environment->addExtension(new ExternalLinkExtension());
            $environment->addExtension(new HeadingPermalinkExtension());
            $environment->addExtension(new GithubFlavoredMarkdownExtension());

            return new MarkdownConverter($environment);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
