<?php

namespace InsightMedia\StatamicOpeningHours\Blueprints;

use Statamic\Facades\Blueprint;

class OpeningHoursBlueprint
{

    public static function get()
    {
        return Blueprint::make()->setContents([
            'sections' => [
                'sections' => [
                    'display' => __('statamic-opening-hours::opening-hours.sections'),
                    'fields' => [
                        [
                            'handle' => 'is_closed',
                            'field' => [
                                'type' => 'toggle',
                                'display' => __('statamic-opening-hours::opening-hours.global.closure.is_closed'),
                                'instructions' => __('statamic-opening-hours::opening-hours.global.closure.is_closed_instructions'),
                            ]
                        ],
                        [
                            'handle' => 'reason',
                            'field' => [
                                'type' => 'text',
                                'display' => __('statamic-opening-hours::opening-hours.global.closure.reason'),
                                'instructions' => __('statamic-opening-hours::opening-hours.global.closure.reason_instructions'),
                                'if' => [
                                    'is_closed' => 'true'
                                ]
                            ]
                        ],
                        [
                            'handle' => 'sections',
                            'field' => [
                                'type' => 'replicator',
                                'display' => __('statamic-opening-hours::opening-hours.sections'),
                                'sets' => [
                                    'section' => [
                                        'display' => __('statamic-opening-hours::opening-hours.section.title'),
                                        'fields' => [
                                            [
                                                'handle' => 'header',
                                                'field' => [
                                                    'type' => 'grid',
                                                    'display' => null,
                                                    'fields' => [
                                                        [
                                                            'handle' => 'title',
                                                            'field' => [
                                                                'type' => 'text',
                                                                'display' => __('statamic-opening-hours::opening-hours.section.title'),
                                                                'validate' => 'required',
                                                                'width' => 66
                                                            ]
                                                        ],
                                                        [
                                                            'handle' => 'slug',
                                                            'field' => [
                                                                'type' => 'slug',
                                                                'display' => __('statamic-opening-hours::opening-hours.section.slug'),
                                                                'from' => 'title',
                                                                'width' => 33
                                                            ]
                                                        ]
                                                    ],
                                                    'mode' => 'table',
                                                    'max_rows' => 1,
                                                    'min_rows' => 1,
                                                    'add_row' => false,
                                                    'hide_display' => true,
                                                    'reorderable' => false
                                                ]
                                            ],
                                            [
                                                'handle' => 'description',
                                                'field' => [
                                                    'type' => 'markdown',
                                                    'display' => __('statamic-opening-hours::opening-hours.section.description'),
                                                    'buttons' => ['bold', 'italic', 'unorderedlist', 'orderedlist', 'link']
                                                ]
                                            ],
                                            [
                                                'handle' => 'is_closed',
                                                'field' => [
                                                    'type' => 'toggle',
                                                    'display' => __('statamic-opening-hours::opening-hours.section.closure.is_closed'),
                                                    'width' => 25
                                                ]
                                            ],
                                            [
                                                'handle' => 'reason',
                                                'field' => [
                                                    'type' => 'text',
                                                    'display' => __('statamic-opening-hours::opening-hours.section.closure.reason'),
                                                    'width' => 75,
                                                    'if' => [
                                                        'is_closed' => 'true'
                                                    ]
                                                ]
                                            ],
                                            [
                                                'handle' => 'hours',
                                                'field' => [
                                                    'type' => 'grid',
                                                    'display' => __('statamic-opening-hours::opening-hours.section.hours.title'),
                                                    'fields' => [
                                                        [
                                                            'handle' => 'description',
                                                            'field' => [
                                                                'type' => 'text',
                                                                'display' => __('statamic-opening-hours::opening-hours.section.hours.description'),
                                                                'width' => 100
                                                            ]
                                                        ],
                                                    ],
                                                    'mode' => 'table',
                                                    'add_row' => __('statamic-opening-hours::opening-hours.section.hours.add'),
                                                    'reorderable' => true
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
}
