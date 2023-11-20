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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-portrait-gallery-' . $block['id'];
$block_class  = 'wp-block block-portrait-gallery';
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
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> bg-<?=$background?> <?=$text_color?> <?=$dark_section?> py-[60px]">
	<div class="container">
		<div class="grid grid-cols-12 gap-x-5 md:gap-x-10">
			<?php if ($subheader || $content ){ ?>
				<div class="col-span-3 hidden md:flex md:flex-col justify-end">
				<?php if ($subheader){ ?>
					<h4 class="text-[14px] font-default tracking-normal font-medium <?=$text_color?>"><?=$subheader?></h4>
				<?php } ?>
				<?php if ($content){ ?>
					<div class="mt-1 body-s md:max-w-[270px] lc-reset <?=$text_color?>"><?=$content?></div>
				<?php } ?>	
			</div>
			<?php } ?>
			<?php if ($header || $gallery){ ?>
				<div class="col-span-12 md:col-start-7 md:col-end-13">
					<?php if ($header){ ?>
						<h3 class="text-[32px] lg:text-[48px] mb-10 md:mb-[50px] <?=$text_color?>"><?=$header?></h3>
					<?php } ?>
					<?php if ($gallery){ ?>
						<div class="grid grid-cols-6 gap-y-[30px] gap-x-5 md:gap-x-10">
							<?php foreach ($gallery as $g) { ?>
								<div class="col-span-3 md:col-span-2">
									<?php if ($g['image']){ ?>
										<div class="mb-[10px]">
											<?php echo wp_get_attachment_image($g['image'], 'hero-article'); ?>
										</div>
									<?php } ?>
									<?php if ($g['heading']){ ?>
										<h3 class="text-[14px] font-default tracking-normal font-medium <?=$text_color?>"><?=$g['heading']?></h4>
									<?php } ?>
									<?php if (isset($g['subheading']) && $g['subheading']){ ?>
										<span class="text-[14px] font-default tracking-normal font-normal <?=$text_color?>"><?=$g['heading']?></span>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php return;