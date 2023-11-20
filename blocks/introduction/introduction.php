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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-end-contact-' . $block['id'];
$block_class  = 'wp-block block-end-contact';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$heading       = (get_field('heading')) ? : '';
$cta_link    = (!empty(get_field('cta_link'))) ? get_field('cta_link') : '';
$image     = (get_field('image')) ? : '';
$subheading     = (get_field('subheading')) ? : '';
$content     = (get_field('content')) ? : '';
$background   = (get_field('background')) ? : '';
$text_color   = ($background == "white") ? 'text-dark-warm-grey' : 'text-white';
$dark_section = ($background !="white") ? 'dark-section' : '';
$border       = ($background !="white") ? 'border-'.$background.'-700 hover:border-white' : 'border-dark-warm-grey-700 hover:border-dark-warm-grey';
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> bg-<?=$background?> <?=$text_color?> <?=$dark_section?> pt-10 pb-20 md:pt-[60px] md:pb-[120px]">
	<div class="container">
		<div class="grid grid-cols-12 gap-x-5 md:gap-x-10">
			<?php if ($image || $cta_link || $heading ){ ?>
				<div class="col-start-5 col-end-13 md:col-span-5 mb-5 md:mb-0">
					<div class="flex flex-col md:flex-row gap-x-11">
						<?php if ($image){ ?>
							<div class="md:w-1/3">
								<?php echo wp_get_attachment_image($image, 'hero-articles'); ?>
							</div>
						<?php } ?>
						<div class="md:max-w-[280px] mt-4 md:mt-0">
							<h3 class="text-[26px] lg:text-[32px] <?=$text_color?>"><?=$heading?></h3>
							<?php if ($cta_link ){ ?>
								<a href="<?=esc_url($cta_link['title'])?>" class="border-b mt-5 inline-flex font-medium transition-all <?=$border?>" target="<?=$cta_link['target']?>"><?=$cta_link['title']?></a>
						</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			<?php if ($subheading || $content){ ?>
				<div class="col-span-8 md:col-start-10 md:col-end-13 mt-20 md:mt-0">
					<?php if ($subheading){ ?>
						<h4 class="text-[14px] font-default tracking-normal font-medium <?=$text_color?>"><?=$subheading?></h4>
					<?php } ?>
					<?php if ($content){ ?>
						<div class="mt-1 body-s <?=$text_color?>"><?=$content?></div>
					<?php } ?>	
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php return;