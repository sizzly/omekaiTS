<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle));
?>

<h1 class="page-header"><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<div class="row">
    <div class="col-xl-4">
        <nav class="items-nav navigation secondary-nav">
            <?php echo public_nav_items(); ?>
        </nav>
    </div>
    <div class="col-xl-4">
        <?php echo pagination_links(); ?>
        <?php echo item_search_filters(); ?>
    </div>
    <div class="col-xl-4">
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

<div class="row">
    <div class="card mb-3">
        <div class="card-body">
            <div class="list-group">
                <?php foreach (loop('items') as $item): ?>
                    <?php
                        $title = metadata($item, 'rich_title', array('no_escape' => true));
                        $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
                        $linktoitem = '/items/show/' . $item->id;
                    ?>

                    <a href="<?php echo $linktoitem; ?>" class="list-group-item list-group-item-action d-flex align-items-top text-white">
                        <div class="w-100px h-100px d-flex align-items-center justify-content-center ms-n1">
                            <?php echo item_image('square_thumbnail', array('class' => 'rounded'), 0, $item); ?>
                        </div>
                        <div class="flex-fill px-3">
                            <div class="fw-bold"><?php echo $title; ?></div>
                            <div class="small text-white text-opacity-50"><?php echo $description; ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="card-arrow">
	        <div class="card-arrow-top-left"></div>
	        <div class="card-arrow-top-right"></div>
	        <div class="card-arrow-bottom-left"></div>
	        <div class="card-arrow-bottom-right"></div>
        </div>
    </div>
</div>

<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>