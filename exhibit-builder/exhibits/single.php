<?php
     $title = metadata($exhibit, 'title', array('no_escape' => true));
     $subtitle = (get_theme_option('Display Featured Subtitle')) ? '<span class="subtitle">' . __('Featured Exhibit') . '</span>' : '';
     $thumbnailSetting = (option('use_square_thumbnail')) ? 'square_thumbnail' : 'fullsize';
     $exhibitImage = (record_image($exhibit)) ? record_image($exhibit, $thumbnailSetting, array('class' => 'image')) : '';
?>
<div class="col-sm-6 col-lg-4 mb-4">   
    <div class="card mb-3">
        <div class="card-body">
            <?php echo link_to($this->exhibit, 'show', $exhibitImage, array('class' => 'image')); ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo link_to($this->exhibit, 'show', $title); ?></h5>
            <?php if ($description): ?>
                <p class="collection-description"><?php echo snippet_by_word_count(metadata($exhibit, 'description', array('no_escape' => true))); ?></p>
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