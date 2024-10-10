<?php
/**
 * Return the HTML for summarizing a random featured exhibit
 *
 * @return string
 */
function thanksroy_display_random_featured_records($type = null, $count = 2, $hasImage = null)
{
    $records = get_records(ucfirst($type), array('featured' => 1,
                                     'sort_field' => 'random',
                                     'hasImage' => $hasImage), $count);

    $recordPaths = [
        'collection' => 'collections/',
        'exhibit' => 'exhibit-builder/exhibits/',
        'item' => 'items/'
    ];
    $html = '';
    if ($records) {
        foreach ($records as $record) {
            $html .= get_view()->partial($recordPaths[$type] . 'single.php', array($type => $record));
            release_object($record);
        }
        if ($type == 'exhibits') {
            $html = apply_filters('exhibit_builder_display_random_featured_exhibit', $html);
        }
    }
    return $html;
}