<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if ( eazy_get_option('global_custom_preloader_html') && eazy_get_option('global_show_preloader') ) : ?>
      <?php echo eazy_get_option('global_custom_preloader_html'); ?>
    <?php endif; ?>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link rel='preconnect' href='https://cdn.keycdn.com' crossorigin>
<?php wp_head(); ?>
</head>

<?php $body_classes = ( eazy_get_option('header_fixed_on_scroll') ) ? 'fix-header-on-scroll' : ''; ?>
<body <?php body_class( $body_classes ); ?>>

<?php if ( eazy_get_option('global_show_preloader') ) : ?>
  <div id="loader"><p class="loader-logo" style="background-image: url('<?php echo eazy_get_option('global_custom_preloader_image'); ?>');"></p></div>
<?php endif; ?>

<?php if ( eazy_get_option('global_show_custom_pointer') ) : ?>
  <div id="pointer"></div>
<?php endif; ?>

<?php 
$eazy_navigation_type = eazy_get_option('navigation_type');  
if ( $eazy_navigation_type && $eazy_navigation_type=='fullsize' ) :
  get_template_part('partials/fullsize-menu');
endif;
?>

<?php if ( eazy_get_option('header_show_topbar') ) : ?>
  <?php get_template_part('partials/header', 'topbar'); ?>
<?php endif; ?>

<header>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-2 col-12">
        <?php get_template_part('partials/header', 'logo'); ?>
      </div>
      <div class="col-md-10 col-12 d-md-block right">
        <div class="d-md-inline-block">
          <?php get_template_part('partials/header', 'navbar'); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="nav-wrapper-full">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="navbar-section">
            <div class="navbar-wrapper row">
              <div class="col-12">
                <?php get_template_part('partials/header', 'navbar'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</header>

<?php if ( eazy_get_option('breadcrumb_show') && !is_front_page() ) : ?>
  <?php get_template_part('partials/header', 'after'); // Title + Breadcrumb ?>
<?php endif; ?>