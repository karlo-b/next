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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-slider-gallery-' . $block['id'];
$block_class  = 'wp-block block-slider-gallery';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$subheader    = (get_field('subheader')) ? : '';
$content      = (get_field('content')) ? : '';
$header       = (get_field('header')) ? : '';
$gallery      = (!empty(get_field('gallery'))) ? get_field('gallery')  : '';
$background   = (get_field('background')) ? : '';
$text_color   = ($background == "white") ? 'text-dark-warm-grey' : 'text-white';
$dark_section = ($background !="white") ? 'dark-section' : '';
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> bg-<?=$background?> <?=$text_color?> <?=$dark_section?> py-[80px] md:py-[220px]">
	<div class="container-fluid">
	<?php if ($gallery){ ?>
			<div class="gallery-slideshow">
				<?php foreach ($gallery as $g) { ?>
					<div class="slide">
						<?php if ($g['image']){ ?>
							<div class="mb-[10px]">
								<?php echo wp_get_attachment_image($g['image'], 'hero-article'); ?>
							</div>
						<?php } ?>
						<?php if ($g['heading']){ ?>
							<h3 class="text-[14px] font-default tracking-normal font-medium <?=$text_color?>"><?=$g['heading']?></h4>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>

<?php return;