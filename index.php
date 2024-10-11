<?php echo head(); ?>


    <!-- BEGIN stats
    <div class="col-xl-3 col-md-6">
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                <div class="flex-fill">
                    <div class="mb-1">Collection Count</div>
                        <h2><?php echo total_records('Items'); ?></h2>
                    <div>Today, 11:25AM</div>
                </div>
                <div class="opacity-5">
                    <i class="fa fa-hashtag fa-4x"></i>
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
    <div class="col-xl-3 col-md-6">
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                <div class="flex-fill">
                    <div class="mb-1">State of Muster</div>   
                </div>
                <div class="opacity-5">
                    <i class="fa fa-hashtag fa-4x"></i>
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
    <div class="col-xl-3 col-md-6">
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                <div class="flex-fill">
                    <div class="mb-1">Faction Distribution</div>
                        <h2><?php echo total_records('Items'); ?></h2>
                    <div>Today, 11:25AM</div>
                </div>
                <div class="opacity-5">
                    <i class="fa fa-hashtag fa-4x"></i>
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
    <div class="col-xl-3 col-md-6">
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                <div class="flex-fill">
                    <div class="mb-1">Collection Value</div>
                        <h2><?php echo total_records('Items'); ?></h2>
                    
                </div>
                <div class="opacity-5">
                    <i class="fa fa-dollar-sign fa-4x"></i>
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
    END stats -->
<div class="row" data-masonry='{"percentPosition": true }'>

    <?php echo random_featured_items(1); ?>


    <?php echo random_featured_collection(1); ?>


    <?php echo thanksroy_display_random_featured_records('exhibit', 2); ?>

</div>

<h2><?php echo __('Recently Added Items'); ?></h2>
<div class="row" data-masonry='{"percentPosition": true }'>
    <?php
        $recentItems = get_theme_option('Homepage Recent Items');
    ?>

    <?php echo recent_items($recentItems); ?>
            
</div>
<p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>

<?php echo foot(); ?>