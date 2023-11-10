<?php
defined( 'ABSPATH' ) || die();

/**
 * Hero Block Template.
 *
 * @param  array       $block       The block settings and attributes.
 * @param  string      $content     The block inner HTML (empty).
 * @param  bool        $is_preview  True during AJAX preview.
 * @param  int|string  $post_id     The post ID this block is saved to.
 */ 

// Build the basic block id and class 
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-cta-link-' . $block['id'];
$block_class  = 'wp-block block-cta-link';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> my-[60px] lg:my-[120px]">
	<div class="container">
		<div class="p-[30px] lg:py-[60px] lg:px-[50px] border hover:border-dark-warm-grey :border-dark-warm-grey-300 transition-all">
			<a class="flex items-center text-dark-warm-grey justify-between" href="#">
				<span class="h2 font-heading">Read news on Linkedin</span>
				<div class="icon flex justify-end">
					<svg class="w-[30px] h-[76px]"  xmlns="http://www.w3.org/2000/svg" width="26" height="43" viewBox="0 0 26 43" fill="none">
					<path d="M1.75 2.5L22.25 21.5L1.75 40.5" stroke="#7E6868" stroke-width="5"/>
					</svg>
				</div>
			</a>
		</div>
	</div>
</div>

<?php return;