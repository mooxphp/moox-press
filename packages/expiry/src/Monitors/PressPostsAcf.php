<?php

namespace Moox\Expiry\Monitors;

use Carbon\Carbon;

class PressPostsAcf
{
    public function __construct()
    {
        // Construct the Press Posts ACF
    }

    public function __invoke()
    {
        // Invoke the Press Posts ACF
    }

    public function boot()
    {
        // Boot the Press Posts ACF
    }

    public function monitor()
    {
        $model = \Moox\Press\Models\WpPostMeta::class;

        $model = \Moox\Press\Models\WpPostMeta::class;

        $query = $model::query();

        $expiringRecords = $query->where('meta_key', 'LIKE', '%_gultig_bis')->get();

        $expiredRecords = $expiringRecords->filter(function ($record) {
            if ($record instanceof \Moox\Press\Models\WpPostMeta) {
                $dateString = substr($record->meta_value, -8);
                if (preg_match("/\d{8}/", $dateString)) {
                    $date = Carbon::createFromFormat('Ymd', $dateString);

                    return $date->isPast();
                }
            }

            return false;
        });

        return $expiredRecords;

        foreach ($expiredRecords as $record) {
            // ID
            echo $record->post_id;

            // TITLE
            $metaKeyTitle = str_replace(
                '_gultig_bis',
                '_download-titel',
                $record->meta_key
            );

            $titleRecord = $record->post
                ->meta()
                ->where('meta_key', $metaKeyTitle)
                ->first();
            //if ($titleRecord) {
            // echo $titleRecord->meta_value;
            //}

            // LINK
            echo "/post/{$record->post->post_name}";

            // AUTHOR
            //if ($record->post->author) {
            //echo $record->post->author->ID;
            //}
            // ACF-NOTIFY - TODO

            // ALL FIELDS
            // title
            // slug
            // item (model, field - notation?)
            // link
            // Expired at
            // Notified at
            // Notified to
            // Escalated at
            // Escalated to
            // Handled by -
            // Done -
            // Expiry Monitor : Press Posts ACF
        }

    }

    public function linksto()
    {
        // now I need the post_id from the wp_postmeta table
        // to construct the link to the post
    }

    public function executes()
    {
        // Execute the Press Posts ACF
    }

    public function notifies()
    {
        // now I need the associated post_meta from the wp_postmeta table
        // to construct the notification
    }

    public function escalates()
    {
        // Escalate the Press Posts ACF
    }
}
