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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-text-list-' . $block['id'];
$block_class  = 'wp-block block-text-list';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$heading = (get_field('heading')) ? : '';
$list    = (!empty(get_field('list'))) ? get_field('list') : '';

$background   = (get_field('background')) ? : '';
$text_color   = ($background == "white") ? 'text-dark-warm-grey' : 'text-white';
$dark_section = ($background !="white") ? 'dark-section' : '';
$border       = ($background !="white") ? 'border-'.$background.'-700 hover:border-white' : 'border-dark-warm-grey-700 hover:border-dark-warm-grey';

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> bg-<?=$background?> <?=$text_color?> <?=$dark_section?> py-10 md:py-[60px]">
	<div class="container">
		<div class="grid grid-cols-12 gap-x-5 md:gap-x-10">
			<?php if ($heading){ ?>
				<div class="col-span-12 md:col-span-3 mb-[60px] md:mnb-0">
					<h3 class="text-[32px] <?=$text_color?>"><?=$heading?></h3>
				</div>	
			<?php } ?>
			<?php if( $list ) { ?>
			<div class="col-span-12 md:col-start-7 md:colend-13">
				<div class="grid gap-x-5 md:gap-x-10 gap-y-10 md:gap-y-[60px] grid-cols-2 ">
					<?php foreach ($list as $l) { ?>
						<div class="flex flex-col items-start">
							<?php if (isset($l['heading']) && $l['heading']){ ?>
								<h4 class="mb-[15px] text-[16px] font-default tracking-normal font-medium <?=$text_color?>"><?=$l['heading']?></h4>
							<?php } ?>
							<?php if (isset($l['content']) && $l['content']){ ?>
								<div class="<?=$text_color?> lg:pr-[30px] leading-normal text-[14px] md:text-[12px] flex flex-col">
									<?=$l['content']?>
								</div>
							<?php } ?>
							<?php if (isset($l['cta_button']) && $l['cta_button']){ ?>
								<?php if ( isset($l['button_style']) && $l['button_style'] == 'button'){ ?>
								<a class="mt-5 py-3 px-4 border leading-none text-[14px] font-medium <?=$border?> transition-all" href="<?=esc_attr($l['cta_button']['url'])?>"><?=$l['cta_button']['title']?></a>
								<?php }else{ ?>
									<a class="mt-5 py-1 px-0 border-b leading-none text-[14px] font-medium <?=$border?> transition-all inline-flex items-end gap-x-[5px]" href="<?=esc_attr($l['cta_button']['url'])?>"><?=$l['cta_button']['title']?>
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3 9L11 1" stroke="currentColor" stroke-width="1.5"/>
										<path d="M4.25 0.75H11.25V7.75" stroke="currentColor" stroke-width="1.5"/>
										</svg>

									</a>
								<?php } ?>
								<?php } ?>
						</div>
						
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php return;