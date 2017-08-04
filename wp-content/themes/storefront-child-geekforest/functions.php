<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

 /**
  * Homepage
  *
  * @see  storefront_featured_products()
  */

  add_action( 'gf_homepage', 'geekforest_slideshow', 5 );
  add_action( 'gf_homepage', 'storefront_featured_products',     40 );


function geekforest_slideshow() {
  //echo 'SLIDESHOW';
  get_template_part( 'slideshow' );
}


 // Creates Slideshow Custom Post Type for homepage
 function slideshow_init() {
     $args = array(
       'label' => 'Slideshow',
         'public' => true,
         'show_ui' => true,
         'capability_type' => 'post',
         'hierarchical' => false,
         'rewrite' => array('slug' => 'slideshow'),
         'query_var' => true,
         //'menu_icon' => 'dashicons-video-alt',
        //  'supports' => array(
        //      'title',
        //      'editor',
        //      'excerpt',
        //      'trackbacks',
        //      'custom-fields',
        //      'comments',
        //      'revisions',
        //      'thumbnail',
        //      'author',
        //      'page-attributes',)
         );
     register_post_type( 'slideshow', $args );
 }
 add_action( 'init', 'slideshow_init' );

 // Creates Students as User Role
 // Add a custom user role

 $result = add_role( 'student', __(
   'Student' ),

     array(
       'read' => false,
       'edit_posts' => false,
       'edit_pages' => false,
       'edit_others_posts' => false,
       'create_posts' => false,
       'manage_categories' => false,
       'publish_posts' => false,
       'edit_themes' => false,
       'install_plugins' => false,
       'update_plugin' => false,
       'update_core' => false
     )
);

// remove widget titles
function remove_widget_titles( $widget_title ) {
  return "";
}
add_filter( 'widget_title', 'remove_widget_titles' );

 add_action('init', 'init_remove_slide_wysiwyg',100);

 function init_remove_slide_wysiwyg(){
     $post_type = 'slideshow';
     remove_post_type_support( $post_type, 'editor');
 }

 if ( ! function_exists( 'gf_buttons_variation_attribute_options' ) ) {

 	/**
 	 * Output a list of variation attributes for use in the cart forms.
 	 *
 	 * @param array $args
 	 * @since 2.4.0
 	 */
 	function gf_buttons_variation_attribute_options( $args = array() ) {
 		$args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
 			'options'          => false,
 			'attribute'        => false,
 			'product'          => false,
 			'selected' 	       => false,
 			'name'             => '',
 			'id'               => '',
 			'class'            => '',
 			'show_option_none' => __( 'Choose an option', 'woocommerce' ),
 		) );

 		$options               = $args['options'];
 		$product               = $args['product'];
 		$attribute             = $args['attribute'];
 		$name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
 		$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
 		$class                 = $args['class'];
 		$show_option_none      = $args['show_option_none'] ? true : false;
 		$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

 		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
 			$attributes = $product->get_variation_attributes();
 			$options    = $attributes[ $attribute ];
 		}

 		$html = '<div id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' gf-variations-button-wrapper" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
 		//$html .= '<button value="">' . esc_html( $show_option_none_text ) . '</button></div>';

 		if ( ! empty( $options ) ) {
 			if ( $product && taxonomy_exists( $attribute ) ) {
 				// Get terms if this is a taxonomy - ordered. We need the names too.
 				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );
 				foreach ( $terms as $term ) {
 					if ( in_array( $term->slug, $options ) ) {
            print_r($term);
            echo '<br />';
            echo '<br />';
 						$html .= '<button class="gf-button-variation" value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</button>';
 					}
 				}
 			} else {
 				foreach ( $options as $option ) {
 					// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
 					$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
 					$html .= '<button class="gf-button-variation" value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</button>';
 				}
 			}
 		}

 		$html .= '</div>';

 		//echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args );
    echo $html;
 	}
 }
