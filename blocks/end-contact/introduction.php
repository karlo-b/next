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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-introduction-' . $block['id'];
$block_class  = 'wp-block block-introduction';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$subheader        = (get_field('subheader')) ? : '';
$header       = (get_field('header')) ? : '';
$position     = (get_field('position')) ? : '';
$background   = (get_field('background')) ? : '';
$text_color   = ($background == "white") ? 'text-dark-warm-grey' : 'text-white';
$dark_section = ($background !="white") ? 'dark-section' : '';
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> bg-<?=$background?> <?=$text_color?> <?=$dark_section?> pb-[10px] pt-[80px]">
	<div class="container">
		<div class="grid grid-cols-12 gap-x-5 md:gap-x-10">
			<?php if ($subheader){ ?>
				<div class="col-span-12 md:col-span-2 mb-5 md:mb-0">
					<h4 class="font-default font-medium text-base <?=$text_color?>"><?=$subheader?></h4>
				</div>
			<?php } ?>
			<?php if ($header){ ?>
				<div class="col-span-12 md:col-start-7 md:col-end-13">
					<h3 class="text-[32px] lg:text-[48px] <?=$text_color?>"><?=$header?></h3>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php return;