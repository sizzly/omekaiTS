<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<h1 class="page-header"><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
<div class="row">
    <div class="col-xl-4">
        <nav class="navigation secondary-nav">
            <?php echo nav(array(
                array(
                    'label' => __('Browse All'),
                    'uri' => url('exhibits')
                ),
                array(
                    'label' => __('Browse by Tag'),
                    'uri' => url('exhibits/tags')
                )
            )); ?>
        </nav>
    </div>
    <div class="col-xl-4">
        <?php echo pagination_links(); ?>
    </div>
    <div class="col-xl-4">
    </div>
</div>

<?php if (count($exhibits) > 0): ?>
    <div class="row" data-masonry='{"percentPosition": true }'>
        <?php foreach (loop('exhibit') as $exhibit): ?>
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
        <?php endforeach; ?>
    </div>
    <?php echo pagination_links(); ?>

<?php else: ?>
    <p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
