<h1>AFTERSCHOOL CONTENT TEMPLATE</h1>
<div>

  <h2>AFTERSCHOOL</h2>

  <?php
  $args = array(
    'post_type' => 'product',
    //'posts_per_page' => 1,
    'product_cat' => 'afterschool',
    'orderby' => 'rand'
  );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post(); global $product;
    //print_r($product);
    $display_title = get_post_meta($product->id, 'display_title', true);

    $title = ($display_title) ? $display_title : $product->name;
    ?>

      <div class="product">

          <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

              <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
              <h3><?php echo $title; ?></h3>

          </a>

      </div>

    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
</div>
