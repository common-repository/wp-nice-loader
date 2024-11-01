<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if( current_user_can( 'administrator' ) ) {

    if( isset( $_POST['oscimp_hidden'] ) && $_POST['oscimp_hidden'] == 'Y') {

        $nice_loader_font_size = isset($_POST['nice_loader_font_size']) ? sanitize_text_field($_POST['nice_loader_font_size']) : '';
        update_option('nice_loader_font_size', $nice_loader_font_size);

        $nice_loader_title = isset($_POST['nice_loader_title']) ? sanitize_text_field($_POST['nice_loader_title']) : '';
        update_option('nice_loader_title', $nice_loader_title);

        $nice_loader_subtitle = isset($_POST['nice_loader_subtitle'])  ?sanitize_text_field($_POST['nice_loader_subtitle']) : '';
        update_option('nice_loader_subtitle', $nice_loader_subtitle);

        $nice_loader_logo_url = isset($_POST['nice_loader_logo_url']) ? sanitize_text_field($_POST['nice_loader_logo_url']): '';
        update_option('nice_loader_logo_url', $nice_loader_logo_url);

        $nice_loader_theme = isset($_POST['nice_loader_theme']) ? sanitize_text_field($_POST['nice_loader_theme']) : '';
        update_option('nice_loader_theme', $nice_loader_theme);

        $nice_loader_home_only = isset($_POST['nice_loader_home_only']) ? 1 : 0;
        update_option('nice_loader_home_only', $nice_loader_home_only);

        $nice_loader_main_color = isset($_POST['nice_loader_main_color']) ? sanitize_text_field($_POST['nice_loader_main_color']) : '';
        update_option('nice_loader_main_color', $nice_loader_main_color);

        ?>
        <div class="updated"><p><strong><?php _e('Options saved.', 'wp-nice-loader' ); ?></strong></p></div>
        <?php
    } else {

        $nice_loader_font_size  = get_option('nice_loader_font_size');
        $nice_loader_title      = get_option('nice_loader_title');
        $nice_loader_subtitle   = get_option('nice_loader_subtitle');
        $nice_loader_logo_url   = get_option('nice_loader_logo_url');
        $nice_loader_theme      = get_option('nice_loader_theme');
        $nice_loader_home_only  = get_option('nice_loader_home_only');
        $nice_loader_main_color = get_option('nice_loader_main_color');

    }
    ?>


    <div class="wrap">

        <h1><?php _e("WP Nice Loader Settings", "wp-nice-loader"); ?></h1>

        <form name="nice_loader_settings_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

            <input type="hidden" name="oscimp_hidden" value="Y">

            <div class="admin-row">
                <div class="admin-col-6">
                    <p class="nice-loader-form-control">
                        <label>
                            <span><?php _e("Font size (in px): ", "wp-nice-loader" ); ?></span>
                            <input type="number" name="nice_loader_font_size" value="<?php echo $nice_loader_font_size; ?>">
                        </label>
                    </p>
                </div>
                <div class="admin-col-6">
                    <p class="nice-loader-form-control">
                        <label>
                            <span><?php _e("Text Color ", "wp-nice-loader" ); ?></span>
                            <input class="jscolor" name="nice_loader_main_color" value="<?php echo $nice_loader_main_color; ?>">
                        </label>
                    </p>
                </div>
            </div>

            <div class="admin-row">
                <div class="admin-col-6">
                    <p class="nice-loader-form-control">
                        <label>
                            <span><?php _e("Loader title: ", "wp-nice-loader" ); ?></span>
                            <input type="text" name="nice_loader_title" value="<?php echo $nice_loader_title ?>">
                        </label>
                    </p>
                </div>
                <div class="admin-col-6">
                    <p class="nice-loader-form-control">
                        <label>
                            <span><?php _e("Loader Subtitle: ", "wp-nice-loader" ); ?></span>
                            <input type="text" name="nice_loader_subtitle" value="<?php echo $nice_loader_subtitle; ?>">
                        </label>
                    </p>
                </div>
            </div>

            <div class="admin-row">

                <div class="admin-col-6">

                    <p class="nice-loader-form-control">
                        <label>
                            <span><?php _e("Loader Logo URL: ", "wp-nice-loader" ); ?></span>
                            <input type="text" name="nice_loader_logo_url" value="<?php echo $nice_loader_logo_url ?>">
                        </label>
                    </p>

                </div>

                <div class="admin-col-6">

                    <p class="nice-loader-form-control">
                        <label>
                            <span><?php _e("Select Loader Theme: " ); ?> <small>Default theme is 'Black on White'</small></span>
                            <select name="nice_loader_theme" id="nice_loader_theme">

                                <option value=""><?php _e("Please choose theme", "wp-nice-loader"); ?></option>

                                <option value="black-on-white" <?php selected( $nice_loader_theme, 'black-on-white' ); ?>>
                                    <?php _e("[Simple] Black on White", "wp-nice-loader"); ?>
                                </option>
                                <option value="black-on-grey" <?php selected( $nice_loader_theme, 'black-on-grey' ); ?>>
                                    <?php _e("[Simple] Black on Grey", "wp-nice-loader"); ?>
                                </option>
                                <option value="white-on-black" <?php selected( $nice_loader_theme, 'white-on-black' ); ?>>
                                    <?php _e("[Simple] White on Black", "wp-nice-loader"); ?>
                                </option>
                                <option value="white-on-grey" <?php selected( $nice_loader_theme, 'white-on-grey' ); ?>>
                                    <?php _e("[Simple] White on Grey", "wp-nice-loader"); ?>
                                </option>

                                <option value="double-bounce" <?php selected( $nice_loader_theme, 'double-bounce' ); ?>>
                                    <?php _e("Double Bounce", "wp-nice-loader"); ?>
                                </option>
                                <option value="folding-cube" <?php selected( $nice_loader_theme, 'folding-cube' ); ?>>
                                    <?php _e("Folding Cube", "wp-nice-loader"); ?>
                                </option>
                                <option value="ping-circle" <?php selected( $nice_loader_theme, 'ping-circle' ); ?>>
                                    <?php _e("Ping Circle", "wp-nice-loader"); ?>
                                </option>
                                <option value="cubic-spinner" <?php selected( $nice_loader_theme, 'cubic-spinner' ); ?>>
                                    <?php _e("Cubic Spinner", "wp-nice-loader"); ?>
                                </option>
                                <option value="cubic-grid" <?php selected( $nice_loader_theme, 'cubic-grid' ); ?>>
                                    <?php _e("Cubic Grid", "wp-nice-loader"); ?>
                                </option>
                                <option value="fading-circle" <?php selected( $nice_loader_theme, 'fading-circle' ); ?>>
                                    <?php _e("Fading Circle", "wp-nice-loader"); ?>
                                </option>
                                <option value="round-circles" <?php selected( $nice_loader_theme, 'round-circles' ); ?>>
                                    <?php _e("Round Circles", "wp-nice-loader"); ?>
                                </option>
                                <option value="three-bounce-circles" <?php selected( $nice_loader_theme, 'three-bounce-circles' ); ?>>
                                    <?php _e("Three Bounce Circles", "wp-nice-loader"); ?>
                                </option>
                                <option value="dancing-rectangles" <?php selected( $nice_loader_theme, 'dancing-rectangles' ); ?>>
                                    <?php _e("Dancing Rectangles", "wp-nice-loader"); ?>
                                </option>

                            </select>
                        </label>
                    </p>

                </div>

            </div>

            <div class="admin-row">
                <div class="admin-col-6">
                    <p class="nice-loader-form-control nice-loader-checkbox">
                        <label>
                            <input name="nice_loader_home_only" type="checkbox" value="<?php echo $nice_loader_home_only; ?>" <?php if ( 1 == $nice_loader_home_only ) echo 'checked="checked"'; ?> />
                            <span><?php _e("Display on Homepage only? ", "wp-nice-loader" ); ?></span>
                        </label>
                    </p>
                </div>
                <div class="admin-col-6"></div>
            </div>

            <div class="admin-row">
                <div class="admin-col-6">
                    <p class="submit">
                        <input type="submit" class="button button-primary button-large" name="Submit"
                        value="<?php _e('Update Options', 'wp-nice-loader' ) ?>" />
                    </p>
                </div>
                <div class="admin-col-6"></div>
            </div>

        </form>
    </div>

<?php } ?>
