<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<?php 
  $subject = metadata($item, array('Dublin Core', 'Subject'), array('snippet' => 150)); 
  $workflow = metadata($item, array('Item Type Metadata', 'Workflow'), array());
  if(empty($workflow)) {
    $workflow = 'New';
  }
?>

<h1 class="page-header">
  <?php echo metadata('item', 'rich_title', array('no_escape' => true)); ?> 
  <small><?php echo $subject; ?></small>
</h1>

<div class="row">
  <?php if ((get_theme_option('Item FileDisplay') == 0) && metadata('item', 'has files')): ?>
    <div class="col-xl-6 col-md-6">
      <div class="card mb-3">
        <div class="card-body">
          <div class="widget-img-list">
            <?php echo item_image('thumbnail', array(), 0, $item); ?>
            <?php
	            foreach ($item->Files as $file) {
                echo '<div class="widget-img-list-item"><a href="/files/original/' . $file['filename'] . '" data-lity><span class="img" style="background-image: url(/files/original/' . $file['filename'] . ')"></span></a></div>';
	            }
            ?>
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
  <?php endif; ?>

  <div class="col-xl-6 col-md-6">
    <div class="card mb-3">
      <div class="card-header fw-bold small">Details</div>
      <div class="card-body">
        <div class="list-group">

          <div class="list-group-item d-flex align-items-center">
            <div class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-orange text-white rounded-2 ms-n1">
              <i class="fas fa-hashtag fa-lg"></i>
            </div>
            <div class="flex-fill px-3">
              <div class="fw-bold"><?php echo tag_string('item'); ?></div>
              <div class="small text-white text-opacity-50">Tags</div>
            </div>
          </div>

          <div class="list-group-item d-flex align-items-center">
            <div class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-orange text-white rounded-2 ms-n1">
              <i class="fas fa-th-list fa-lg"></i>
            </div>
            <div class="flex-fill px-3">
              <div class="fw-bold"><?php echo link_to_collection_for_item(); ?></div>
              <div class="small text-white text-opacity-50">Order of Battle</div>
            </div>
          </div>

          <div class="list-group-item d-flex align-items-center">
            <div class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-orange text-white rounded-2 ms-n1">
              <i class="fas fa-paint-brush fa-lg"></i>
            </div>
            <div class="flex-fill px-3">
              <div class="fw-bold"><?php echo $workflow; ?></div>
              <div class="progress">
                <?php if ($workflow == 'New') : ?>
                  <div class="progress-bar bg-teal" style="width: 0%">0%</div>
                <?php elseif($workflow == 'Assembled') : ?>
                  <div class="progress-bar bg-teal" style="width: 10%">10%</div>
                <?php elseif($workflow == 'In Progress') : ?>
                  <div class="progress-bar bg-teal" style="width: 20%">20%</div>
                <?php elseif($workflow == 'Battle Ready') : ?>
                  <div class="progress-bar bg-teal" style="width: 60%">60%</div>
                <?php elseif($workflow == 'Parade Ready') : ?>
                  <div class="progress-bar bg-teal" style="width: 100%">100%</div>
                <?php endif; ?>
              </div>
              <div class="small text-white text-opacity-50">Muster Status</div>
            </div>
          </div>


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
</div>

<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
<ul class="pagination mb-0">
  <li id="previous-item" class="page-item"><?php echo link_to_previous_item_show(); ?></li>
  <li id="next-item" class="page-item"><?php echo link_to_next_item_show(); ?></li>
</ul>

 <?php echo foot(); ?>