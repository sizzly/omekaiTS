<?php
$collectionTitle = metadata('collection', 'display_title');
$totalItems = metadata('collection', 'total_items');
?>

<?php echo head(array('title' => $collectionTitle, 'bodyclass' => 'collections show')); ?>

<h1 class="page-header">
    <?php echo metadata('collection', 'rich_title', array('no_escape' => true)); ?>
    <small></small>
</h1>

<div class="row">
    <div class="col-xl-8 col-md-8">
        <div class="card mb-3">
            <div class="card-header fw-bold small">Unit Members</div>
            <div class="card-body">
                <div class="widget-img-list">
                    <?php if ($totalItems > 0): ?>
                        <?php foreach (loop('items') as $item): ?>
                            <?php $itemTitle = metadata('item', 'display_title'); ?>
                            <?php if (metadata('item', 'has files')): ?>
                                <div class="widget-img-list-item">
                                    <?php echo link_to_item(item_image('square_thumbnail', array('alt' => $itemTitle))); ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p><?php echo __("There are currently no models in this unit."); ?></p>
                    <?php endif; ?>
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

    <div class="col-xl-4 col-md-4">
        <div class="card mb-3">
            <div class="card-header fw-bold small">Unit Details</div>
            <div class="card-body">
                <?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
            </div>
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
        </div>
    </div>
</div>

<?php echo foot(); ?>