<?php

use Carbon\Carbon;
use Moox\Press\Models\WpPost;

$oneYearAgo = Carbon::now()->subYear();

// ->wichtig() gibt es gar nicht, im model wieder löschen
// an verantwortlich (meta)
// oder an administration mit info, kein verantw

$posts = WpPost::where('post_type', 'wiki')
    ->where('post_status', 'publish')
    ->whereDate('post_modified', '<', $oneYearAgo)
    ->where('post_parent', 0)
    ->get();

foreach ($posts as $post) {
    $themaTaxonomy = $post
        ->taxonomies()
        ->where('taxonomy', 'thema')
        ->first();

    // Display the term name if the taxonomy exists
    if ($themaTaxonomy) {
        echo 'Term Name: '.$themaTaxonomy->term->name."\n";
    } else {
        echo "No 'thema' taxonomy found for post ID: {$post->ID}\n";
    }
}
