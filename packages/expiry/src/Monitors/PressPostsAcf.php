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

        $query = $model::query();

        $expiringRecords = $query->where('meta_key', 'LIKE', '%_expired')->get();

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

        // needs to be an array of
        // - post_id
        // - Titel
        // 2701123	31532	downloads_0_download-rubrik_1_download-titel	WRAS Zertifikat
        // 2701127	31532	downloads_0_download-rubrik_1_gultig_bis	20230228
        // - link to the post
        // - notification to

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
