<?php
    if ( ! defined( 'ABSPATH' ) ) exit;
    $nice_loader_font_size  = get_option('nice_loader_font_size');
    $nice_loader_title      = get_option('nice_loader_title');
    $nice_loader_subtitle   = get_option('nice_loader_subtitle');
    $nice_loader_logo_url   = get_option('nice_loader_logo_url');
    $nice_loader_theme      = get_option('nice_loader_theme');
    $nice_loader_home_only  = get_option('nice_loader_home_only');

    $nice_loader_main_color = get_option('nice_loader_main_color');
    $main_color = '';
    if($nice_loader_main_color && !empty($nice_loader_main_color)){
        $main_color = "style='color:#".$nice_loader_main_color."';";
    }
?>

<?php if( $nice_loader_home_only && ( is_home() || is_front_page() ) ) : ?>

<div id="wp_nice_loader_container" class="<?php echo $nice_loader_theme ? $nice_loader_theme : 'black_on_white'; ?>">

    <div class="wp_nice_loader" style="font-size:<?php echo $nice_loader_font_size ? $nice_loader_font_size : '32'; ?>px;">

        <?php if($nice_loader_logo_url): ?>
            <div class="wp_nice_loader_logo">
                <img src="<?php echo $nice_loader_logo_url; ?>" alt="<?php echo $nice_loader_title ? $nice_loader_title : __("logo","wp-nice-loader"); ?>" />
            </div>
        <?php endif; ?>
        <?php if($nice_loader_title): ?>
            <div class="wp_nice_loader_title" <?php echo $main_color; ?>><?php echo $nice_loader_title; ?></div>
        <?php endif; ?>
        <?php if($nice_loader_subtitle): ?>
            <div class="wp_nice_loader_subtitle" <?php echo $main_color; ?>><?php echo $nice_loader_subtitle; ?></div>
        <?php endif; ?>

        <?php switch ($nice_loader_theme) {

                case 'folding-cube': ?>

                    <div class="sk-folding-cube">
                      <div class="sk-cube1 sk-cube"></div>
                      <div class="sk-cube2 sk-cube"></div>
                      <div class="sk-cube4 sk-cube"></div>
                      <div class="sk-cube3 sk-cube"></div>
                    </div>

                    <?php
                    break;

                case 'ping-circle': ?>
                    <div class="spinner"></div>
                <?php
                    break;

                case 'cubic-spinner' : ?>
                    <div class="spinner"></div>
                <?php
                    break;

                case 'cubic-grid' : ?>
                    <div class="sk-cube-grid">
                        <div class="sk-cube sk-cube1"></div>
                        <div class="sk-cube sk-cube2"></div>
                        <div class="sk-cube sk-cube3"></div>
                        <div class="sk-cube sk-cube4"></div>
                        <div class="sk-cube sk-cube5"></div>
                        <div class="sk-cube sk-cube6"></div>
                        <div class="sk-cube sk-cube7"></div>
                        <div class="sk-cube sk-cube8"></div>
                        <div class="sk-cube sk-cube9"></div>
                    </div>
                <?php
                    break;

                case 'fading-circle': ?>
                    <div class="sk-fading-circle">
                        <div class="sk-circle1 sk-circle"></div>
                        <div class="sk-circle2 sk-circle"></div>
                        <div class="sk-circle3 sk-circle"></div>
                        <div class="sk-circle4 sk-circle"></div>
                        <div class="sk-circle5 sk-circle"></div>
                        <div class="sk-circle6 sk-circle"></div>
                        <div class="sk-circle7 sk-circle"></div>
                        <div class="sk-circle8 sk-circle"></div>
                        <div class="sk-circle9 sk-circle"></div>
                        <div class="sk-circle10 sk-circle"></div>
                        <div class="sk-circle11 sk-circle"></div>
                        <div class="sk-circle12 sk-circle"></div>
                    </div>
                <?php
                    break;

                case 'round-circles': ?>
                    <div class="sk-circle">
                      <div class="sk-circle1 sk-child"></div>
                      <div class="sk-circle2 sk-child"></div>
                      <div class="sk-circle3 sk-child"></div>
                      <div class="sk-circle4 sk-child"></div>
                      <div class="sk-circle5 sk-child"></div>
                      <div class="sk-circle6 sk-child"></div>
                      <div class="sk-circle7 sk-child"></div>
                      <div class="sk-circle8 sk-child"></div>
                      <div class="sk-circle9 sk-child"></div>
                      <div class="sk-circle10 sk-child"></div>
                      <div class="sk-circle11 sk-child"></div>
                      <div class="sk-circle12 sk-child"></div>
                    </div>
                <?php
                    break;

                case 'three-bounce-circles': ?>
                    <div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                <?php
                    break;

                case 'dancing-rectangles': ?>
                    <div class="spinner">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                <?php
                    break;

                case 'double-bounce': ?>

                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>

                <?php
                    break;

                default:
                    # code...
                    break;
            }
        ?>

    </div>

</div>

<?php endif; ?>
