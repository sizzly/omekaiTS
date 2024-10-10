<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<h1 class="page-header"><?php echo $pageTitle; ?> <?php echo __('(%s total)', $total_results); ?></h1>

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
<?php foreach (loop('collections') as $collection): ?>
  <?php
    $title = metadata($collection, 'rich_title', array('no_escape' => true));
    $description = metadata($collection, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
  <div class="col-sm-6 col-lg-4 mb-4">   
    <div class="card mb-3">
        <div class="card-body">
            <?php if ($collectionImage = record_image($collection,'square_thumbnail')): ?>
                <?php echo link_to($this->collection, 'show', $collectionImage, array('class' => 'image')); ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo link_to($this->collection, 'show', $title); ?></h5>
            <?php if ($description): ?>
                <p class="collection-description"><?php echo $description; ?></p>
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

<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

<?php echo foot(); ?>
