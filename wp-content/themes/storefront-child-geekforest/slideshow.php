<?php
$query = new WP_Query(array(
	'post_type' => 'slideshow',
	'post_status' => 'publish',
	'meta_key'		=> 'order_number',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC'
));
?>

<div class="gf_slideshow slider">

<?php
$slides = '';
while ($query->have_posts()) {
		$query->the_post();

		//print_r($query);
		$post_id = get_the_ID();
		//echo $post_id;
		$imgID = get_post_meta($post_id, 'image', true);
		$img = get_post_meta($imgID, '_wp_attached_file', true );
		$img_meta = get_post_meta($imgID, '_wp_attachment_metadata', true );
		$alt_text = get_post_meta($post_id, 'alt_text', true);
		$lnk = get_post_meta($post_id, 'url', true);

		$slides .= '<div class="gf_slide">';
		if ($lnk != "") $slides .= '<a href="' . $lnk . '">';
		$slides .= '<img src="/wp-content/uploads/' . $img . '" alt="' . $alt_text . '" />';
		if ($lnk != "") $slides .= '</a>';
		$slides .= '</div>';
}
echo $slides;
wp_reset_query();
?>

</div>
