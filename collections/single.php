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