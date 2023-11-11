<?php

use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\CommonMark\Node\Block\ListBlock;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use League\CommonMark\Extension\CommonMark\Node\Block\ThematicBreak;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkRenderer;
use League\CommonMark\Extension\Table\Table;
use League\CommonMark\Extension\Table\TableCell;
use League\CommonMark\Extension\Table\TableRow;
use League\CommonMark\Node\Block\Paragraph;

return [
    'renderer' => [
        'block_separator' => "\n",
        'inner_separator' => "\n",
        'soft_break' => "\n",
    ],
    'commonmark' => [
        'enable_em' => true,
        'enable_strong' => true,
        'use_asterisk' => true,
        'use_underscore' => true,
        'unordered_list_markers' => ['-', '*', '+'],
    ],
    'html_input' => 'strip',
    'allow_unsafe_links' => false,
    'max_nesting_level' => 10,
    'slug_normalizer' => [
        'max_length' => 255,
    ],
    'heading_permalink' => [
        'html_class' => 'px-2 text-md',
        'id_prefix' => '',
        'apply_id_to_heading' => false,
        'heading_class' => '',
        'fragment_prefix' => '',
        'insert' => 'after',
        'min_heading_level' => 1,
        'max_heading_level' => 6,
        'title' => 'Permalink',
        'symbol' => HeadingPermalinkRenderer::DEFAULT_SYMBOL,
        'aria_hidden' => true,
    ],
    'default_attributes' => [
        Heading::class => [
            'class' => static function (Heading $node) {
                if ($node->getLevel() === 1) {
                    return 'text-3xl font-bold';
                } elseif ($node->getLevel() === 2) {
                    return 'text-xl font-bold';
                } else {
                    return 'font-bold';
                }
            },
        ],
        Table::class => [
            'class' => 'mx-auto',
        ],
        TableRow::class => [
            'class' => 'border-b border-slate-400 dark:border-slate-700',
        ],
        // Seems to be td
        TableCell::class => [
            'class' => 'py-2 px-4'
        ],
        Paragraph::class => [
            'class' => 'leading-loose',
        ],
        ThematicBreak::class => [
            'class' => 'mx-auto h-0.5 w-full border-0 bg-slate-400'
        ],
        Link::class => [
            'class' => 'text-blue-600 visited:text-red-600 hover:text-blue-400 visited:hover:text-red-400 active:text-blue-400 visited:active:text-red-400 dark:text-blue-400 dark:visited:text-red-400 dark:hover:text-blue-600 dark:visited:hover:text-red-600 dark:active:text-blue-600 dark:visited:active:text-red-600',
        ],
        // ListBlock applies to the ul/ol
        ListBlock::class => [
            'class' => static function (ListBlock $node) {
                if ($node->getListData()->type === "ordered") {
                    return "list-inside list-decimal last:pl-6";
                } else {
                    return "list-inside list-disc last:pl-6";
                }
            }
        ],
        ListItem::class => [
            'class' => ''
        ]
    ],
    'external_link' => [
        'internal_hosts' => 'localhost',
        'open_in_new_window' => true,
        'html_class' => 'external-link',
        'nofollow' => '',
        'noopener' => 'external',
        'noreferrer' => 'external',
    ],
];
