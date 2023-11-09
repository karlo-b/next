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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-quote-' . $block['id'];
$block_class  = 'wp-block block-quote';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?>">
	<div class="container lg:px-0">
		<div class="min-h-screen flex flex-col justify-center lg:py-30 lg:px-[133px]">
			<div class="w-10 h-10 flex items-center justify-center border border-dark-warm-grey text-dark-warm-grey mx-auto animate animate-up">
				<svg xmlns="http://www.w3.org/2000/svg" width="19" height="14" viewBox="0 0 19 14" fill="none">
				<path d="M2.82258 7.64144H7.06128V14H0.5V7.64144L5.26129 0H7.70001L2.82258 7.64144ZM13.6226 7.64144H17.8613V14H11.3V7.64144L16.0613 0H18.5L13.6226 7.64144Z" fill="currentColor"/>
				</svg>
			</div>
			<div class="my-10 lg:my-[70px] text-dark-warm-grey quote text-center font-heading text-[28px] lg:text-[66px] leading-[110%] animate animate-up">
			“Gavdi’s expertise and ongoing support is enabling <a>VR Group</a> to get the greatest value out of our SAP <a>SuccessFactors</a> investment”
			</div>
			<div class="flex flex-col items-center animate animate-up">
				<img class="w-[50px] h-[63px] mb-5" src="<?=get_stylesheet_directory_uri()?>/images/author.jpg" alt="author">
				<h4 class="text-dark-warm-grey font-medium text-sm">Heini Toivonen</h4>
				<span class="text-dark-warm-grey-700 text-sm">Vice President of HR</span>
			</div>
		</div>
	</div>
</div>

<?php return;