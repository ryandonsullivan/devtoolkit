<?php

/**
 * The file that defines the plugin's helper functions for posts.
 *
 * @link       https://www.southernweb.com/
 * @since      1.0.3
 *
 * @package    SWG_Toolkit
 * @subpackage SWG_Toolkit/includes
 */

/**
 * Display posts in customized loops.
 *
 * @todo - write better docs for this function :)
 *
 * @param  string $post_type - the post type to get posts from
 * @param  init $limit - the amount of posts to show
 * @param  string $wrapper - the type of wrapper around the posts
 * @param  array $details_array - what details from each post to display
 *
 * @return string
 */
if ( ! function_exists( 'swg_toolkit_display_posts' ) ) {
    function swg_toolkit_display_posts( $post_type = 'post', $limit = 10, $wrapper = 'ul', $details_array = array() ) {
        // Post args.
        $args = array(
            'numberposts' => $limit,
            'post_type'   => $post_type
        );

        // Get posts.
        $posts = get_posts( $args );

        // Default image_size.
        if ( ! $details_array['image_size'] ) {
          $details_array['image_size'] = 'thumbnail';
        }
        // Default featured_image.
        if ( ! $details_array['featured_image'] ) {
          $details_array['featured_image'] = 'show';
        }
        // Default post_date.
        if ( ! $details_array['post_date'] ) {
          $details_array['post_date'] = 'show';
        }
        // Default categories.
        if ( ! $details_array['categories'] ) {
          $details_array['categories'] = 'show';
        }

        // Display posts as unordered list.
        if ( 'ul' === $wrapper ) {
            $str = '<ul class="swg-toolkit-display-posts">';
            // Loop through posts.
            foreach ( $posts as $post ) {
                $str .= '<li><a href="' . get_permalink( $post->ID ) . '">' . get_the_title( $post->ID ) . '</a></li>';
            }
            $str .= '</ul>';
        }

        // Display posts as div blocks.
        if ( 'div' === $wrapper ) {
            // Loop through posts.
            $str  = '<div class="swg-toolkit-display-posts">';
            foreach ( $posts as $post ) {
                // Post thumbnail.
                $post_thumbnail = get_the_post_thumbnail( $post->ID, $details_array['image_size'] );
                // Post date.
                $post_date = get_the_date( '', $post->ID );
                // Post categories.
                $post_categories = get_the_term_list( $post->ID, 'category', '', ' ', '' );
                // Create post.
                $str .= '<div class="swg-toolkit-post">';
                // Add thumbnail?
                if ( 'show' == $details_array['featured_image'] && $post_thumbnail ) {
                    $str .= $post_thumbnail;
                }
                // Add title.
                $str .= '<h3><a href="' . get_permalink( $post->ID ) . '">' . get_the_title( $post->ID ) . '</a></h3>';
                // Add categories?
                if ( 'show' == $details_array['categories'] && $post_categories ) {
                  $str .= '<span class="categories">' . $post_categories . '</span>';
                }
                // Add post date?
                if ( 'show' == $details_array['post_date'] ) {
                  $str .= '<span class="date">' . $post_date . '</span>';
                }
                // Finish post.
                $str .= '</div>';
            }
            $str .= '</div>';
        }

        return $str;
    }
}

/**
 * Get the 'primary' category for a specific post
 *
 * @todo - write better docs for this function :)
 *
 * @return object
 */
if ( ! function_exists( 'swg_toolkit_get_post_primary_category' ) ) {
    function swg_toolkit_get_post_primary_category( $post_id, $term = 'category', $return_all_categories = false ) {
        $return = array();
        if ( class_exists( 'WPSEO_Primary_Term' ) ) {
            // Show Primary category by Yoast if it is enabled & set
            $wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
            $primary_term       = get_term( $wpseo_primary_term->get_primary_term() );
            if ( ! is_wp_error( $primary_term ) ) {
                $return['primary_category'] = $primary_term;
            }
        }
        if ( empty( $return['primary_category']) || $return_all_categories ) {
            $categories_list = get_the_terms( $post_id, $term );
            if ( empty( $return['primary_category']) && ! empty( $categories_list ) ) {
                $return['primary_category'] = $categories_list[0];
            }
            if ( $return_all_categories ) {
                $return['all_categories'] = array();
                if ( ! empty( $categories_list ) ) {
                    foreach( $categories_list as &$category ) {
                        $return['all_categories'][] = $category->term_id;
                    }
                }
            }
        }
        return $return;
    }
}
