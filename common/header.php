<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php if ($author = option('author')): ?>
    <meta name="author" content="<?php echo $author; ?>" />
    <?php endif; ?>
    <?php if ($copyright = option('copyright')): ?>
    <meta name="copyright" content="<?php echo $copyright; ?>" />
    <?php endif; ?>
   <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>


    <!-- Stylesheets -->
    <?php
    queue_css_file(array('app.min','vendor.min','lity.min'));
    echo head_css();
    ?>
    <style>
        img {width:100%;}
    </style>

</head>

<body class="app-with-bg">
    <div id="app" class="app app-boxed-layout app-content-full-width">
        <div id="header" class="app-header">
            <!-- BEGIN brand -->
			<div class="brand">
				<a href="/" class="brand-logo">
					<span class="brand-img">
						<span class="brand-img-text text-theme">I</span>
					</span>
					<span class="brand-text">iToysoldiers.com</span>
				</a>
			</div>
			<!-- END brand -->

            <!-- BEGIN menu -->
			<div class="menu">
				<div class="menu-item dropdown">
					<a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app" class="menu-link">
						<div class="menu-icon"><i class="bi bi-search nav-icon"></i></div>
					</a>
				</div>
                <div class="menu-item dropdown dropdown-mobile-full">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                        <div class="menu-icon"><i class="bi bi-grid nav-icon"></i></div>
                    </a>
					<div class="dropdown-menu dropdown-menu-end me-lg-3 fs-13px mt-1">
                        <?php echo public_nav_main(array('role' => 'navigation')); ?>
					</div>
				</div>
			</div>
			<!-- END menu -->
			
			<!-- BEGIN menu-search -->
            <form class="menu-search" id="search-form" name="search-form" action="/search" aria-label="Search" method="get">
	            <div class="menu-search-container">
	                <div class="menu-search-icon">
                        <i class="bi bi-search"></i>
                    </div>
	                <div class="menu-search-input">
		                <input type="text" class="form-control form-control-lg" placeholder="Search menu..." name="query" id="query" value="" title="Query" aria-label="Query" aria-labelledby="search-form query"/>
	                    <input type="hidden" name="query_type" value="keyword" id="query_type">
	                    <input type="hidden" name="record_types[]" value="Item">
	                    <input type="hidden" name="record_types[]" value="File">
	                    <input type="hidden" name="record_types[]" value="Collection">
	                </div>
	                <div class="menu-search-icon">
		                <a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app"><i class="bi bi-x-lg"></i></a>
	                </div>
                </div>
            </form>
			<!-- END menu-search -->
        </div>

        <!-- BEGIN content -->
        <div id="content" class="app-content">