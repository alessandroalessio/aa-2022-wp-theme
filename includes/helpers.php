<?php
/**
 * Clean Page Template Slug
 */
if (!function_exists('eazy_get_page_template_slug_clean')){
    function eazy_get_page_template_slug_clean(){
        return str_replace( ['page-template/', '.php'] , '' , get_page_template_slug() );
    }
}
/**
 * Get Eazy Option
 */
if (!function_exists('eazy_get_option')){
    function eazy_get_option($option_suffix){
        global $EAZY_2021_OPT;
        if ( isset($EAZY_2021_OPT['eazy_2021_'.$option_suffix]) ){
            return $EAZY_2021_OPT['eazy_2021_'.$option_suffix];
        } else {
            return false;
        }
    }
}
/**
 * Eazy Option
 */
if (!function_exists('eazy_option')){
    function eazy_option($option_suffix){
        echo eazy_get_option($option_suffix);
    }
}
/**
 * Eazy Image
 */
if (!function_exists('eazy_img')){
    function eazy_img($input, $alt=""){
        if (filter_var($input, FILTER_VALIDATE_URL)) {
            $img_src = str_replace( get_site_url(), '', $input);
            $img_path = rtrim(ABSPATH, '/').$img_src;
            $img_data = getimagesize($img_path);

            // echo '<picture>';
            //     echo '<source srcset="'.$input.'.webp" type="image/webp">';
            //     echo '<source srcset="'.$input.'" type="image/png">';
                echo '<img src="'.$input.'" alt="'.$alt.'" '.$img_data[3].' class="img-fluid">';
            // echo '</picture>';
        }
    }
}
/**
 * Eazy Breadcrumb
 */
if ( !function_exists('eazy_the_breadcrumb') ) {
    function eazy_the_breadcrumb() {
        echo '<nav aria-label="breadcrumb">';
            echo '<ol class="breadcrumb">';
                if (!is_home()) {
                    echo '<li class="breadcrumb-item"><a href="'; echo get_option('home'); echo '" title="Home">';
                        echo 'Home';
                    echo "</a></li>";
                    
                    if ( is_post_type_archive() ){
                        echo '<li class="breadcrumb-item"><a href="'.get_post_type_archive_link( get_post_type() ).'" title="'.esc_attr( get_the_archive_title() ).'">'; echo get_the_archive_title(); echo '</a></li>';
                    }
                    if (is_page()) {
                        echo '<li class="breadcrumb-item">'; echo the_title(); echo '</li>';
                    } else {
                        if ( is_singular( get_post_type() ) ){
                            echo '<li class="breadcrumb-item"><a href="'.get_post_type_archive_link( get_post_type() ).'" title="'.esc_attr( get_the_archive_title() ).'">'; echo get_the_archive_title(); echo '</a></li>';
                            echo '<li class="breadcrumb-item">'; echo get_the_title(); echo '</li>';
                        }
                        if ( is_single() && !is_singular() ){
                            echo '<li class="breadcrumb-item">'; echo get_the_title(); echo '</li>';
                        }
                    }
                }
                elseif ( eazy_is_blog() ) {
                    echo '<li class="breadcrumb-item"><a href="'; echo get_option('home'); echo '" title="Home">';
                        echo 'Home';
                    echo "</a></li>";
                    if ( is_single() ) {
                        echo '<li class="breadcrumb-item">'; echo get_the_title(); echo '</li>';
                    }
                }
                elseif (is_tag()) {single_tag_title();}
                elseif (is_day()) {echo"<li class=\"breadcrumb-item\">Archive for "; the_time('F jS, Y'); echo'</li>';}
                elseif (is_month()) {echo"<li class=\"breadcrumb-item\">Archive for "; the_time('F, Y'); echo'</li>';}
                elseif (is_year()) {echo"<li class=\"breadcrumb-item\">Archive for "; the_time('Y'); echo'</li>';}
                elseif (is_author()) {echo"<li class=\"breadcrumb-item\">Author Archive"; echo'</li>';}
                elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li class=\"breadcrumb-item\">Blog Archives"; echo'</li>';}
                elseif (is_search()) {echo"<li class=\"breadcrumb-item\">Search Results"; echo'</li>';}
            echo '</ol>';
        echo '</nav>';
    }
}
/**
 * Eazy is Blog
 */
if ( !function_exists('eazy_is_blog') ) {
    function eazy_is_blog () {
        return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
    }
}
?>