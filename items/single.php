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
                );
            }
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