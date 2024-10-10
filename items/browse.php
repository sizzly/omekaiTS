<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle));
?>

<h1 class="page-header"><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<div class="row">
    <div class="col-xl-3">
        <nav class="items-nav navigation secondary-nav">
            <?php echo public_nav_items(); ?>
        </nav>
    </div>
    <div class="col-xl-3">
        <?php echo item_search_filters(); ?>
    </div>
    <div class="col-xl-3">
        <?php echo pagination_links(); ?>

        <?php if ($total_results > 0): ?>
            <?php
                $sortLinks[__('Title')] = 'Dublin Core,Title';
                $sortLinks[__('Creator')] = 'Dublin Core,Creator';
                $sortLinks[__('Date Added')] = 'added';
            ?>
            <div id="sort-links">
                <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
            </div>

        <?php endif; ?>
    </div>
</div>

<div class="row" data-masonry='{"percentPosition": true }'>
    <?php foreach (loop('items') as $item): ?>
        <?php
            $title = metadata($item, 'rich_title', array('no_escape' => true));
            $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
        ?>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card mb-3">
                <div class="card-body">
                    <?php if (metadata($item, 'has files')) {
                        echo link_to_item(
                        item_image('square_thumbnail', array(), 0, $item),
                        array('class' => 'card-img-top'), 'show', $item
                        );}
                    ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo link_to($item, 'show', $title); ?></h5>
                    <?php if ($description): ?>
                        <p class="card-text"><?php echo $description; ?></p>
                    <?php endif; ?>
                </div>
                <div class="card-arrow">
	                <div class="card-arrow-top-left"></div>
	                <div class="card-arrow-top-right"></div>
	                <div class="card-arrow-bottom-left"></div>
	                <div class="card-arrow-bottom-right"></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
<?php echo foot(); ?>
