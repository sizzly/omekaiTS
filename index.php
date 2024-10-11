<?php echo head(); ?>

<div class="row">
    <?php echo random_featured_items(1); ?>
    <?php echo random_featured_collection(1); ?>
    <?php echo thanksroy_display_random_featured_records('exhibit', 2); ?>
</div>

<h2><?php echo __('Recently Added Items'); ?></h2>

<div class="row">
    <?php
        $recentItems = get_theme_option('Homepage Recent Items');
    ?>
    <?php echo recent_items($recentItems); ?>         
</div>

<p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>

<?php echo foot(); ?>