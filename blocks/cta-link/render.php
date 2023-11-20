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
$link         = (!empty(get_field('link') ) ) ? get_field('link') : '';
$background   = (get_field('background')) ? : '';
$text_color   = ($background == "white") ? 'text-dark-warm-grey' : 'text-white';
$border       = ($background !="white") ? 'border-'.$background.'-700 hover:border-white': 'border-dark-warm-grey-700 hover:border-dark-warm-grey';
$dark_section = ($background !="white") ? 'dark-section' : '';
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> py-[60px] lg:py-[120px] bg-<?=$background?> <?=$text_color?> <?=$dark_section?>">
	<div class="container">
		<div class="p-[30px] lg:py-[60px] lg:px-[50px] border hover:border-dark-warm-grey <?=$border?> transition-all">
			<?php if ($link){ ?>
				<a class="flex items-center text-dark-warm-grey justify-between" href="<?=esc_url($link['url'])?>" target="<?$link['target']?>">
					<span class="font-heading text-[26px] md:text-[32px] lg:text-[62px] <?=$text_color?>"><?=$link['title']?></span>
					<div class="icon flex justify-end <?=$text_color ?>">
						<svg class="w-[30px] h-[76px]"  xmlns="http://www.w3.org/2000/svg" width="26" height="43" viewBox="0 0 26 43" fill="none">
						<path d="M1.75 2.5L22.25 21.5L1.75 40.5" stroke="currentColor" stroke-width="5"/>
						</svg>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
</div>

<?php return;