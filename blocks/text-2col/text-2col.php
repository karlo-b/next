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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-text-2col-' . $block['id'];
$block_class  = 'wp-block block-text-2col';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$heading       = (get_field('heading')) ? : '';
$subheading    = (get_field('subheading')) ? : '';
$text_col_1    = (get_field('text_col_1')) ? : '';
$text_col_2    = (get_field('text_col_2')) ? : '';
$cta_button_1  = (!empty(get_field('cta_button_1'))) ? get_field('cta_button_1') : '';
$cta_button_2  = (!empty(get_field('cta_button_2'))) ? get_field('cta_button_2') : '';
$numbered_list = (!empty(get_field('numbered_list'))) ? get_field('numbered_list') : '';
$grid_class    = ($text_col_2) ? ' md:grid-cols-2' : 'grid-cols-1';

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
			<?php if( $text_col_1 || $text_col_2 || $subheading || $cta_button_1 || $cta_button_2 ) { ?>
			<div class="col-span-12 md:col-start-7 md:col-end-13">
				<?php if ( $subheading ){ ?>
					<h4 class="mb-5 md:mb-[30px] text-[16px] font-default tracking-normal font-medium <?=$text_color?>"><?=$subheading?></h4>
				<?php } ?>
				<div class="grid gap-x-10 <?=$grid_class?>">
					<?php if ($text_col_1 ){ ?>
						<div class="<?=$text_color?> lg:pr-[30px] leading-normal text-[14px] md:text-[12px] flex flex-col">
							<?=$text_col_1 ?>
						</div>
					<?php } ?>
					<?php if ($text_col_2){ ?>
						<div class="<?=$text_color?> lg:pr-[30px] leading-normal text-[14px] md:text-[12px] flex flex-col">
							<?=$text_col_2?>
						</div>
					<?php } ?>
				</div>
				<?php if ($cta_button_1 || $cta_button_2 ){ ?>
					<div class="flex gap-x-[10px] mt-[30px] md:mt-[45px]">
						<?php if ($cta_button_1){ ?>
								<a class="py-3 px-4 border leading-none text-[14px] font-medium <?=$border?> transition-all" href="<?=esc_attr($cta_button_1['url'])?>"><?=$cta_button_1['title']?></a>
						<?php } ?>
						<?php if ($cta_button_2){ ?>
								<a class="py-3 px-4 text-[14px] leading-none font-medium border <?=$border?> transition-all" href="<?=esc_attr($cta_button_2['url'])?>"><?=$cta_button_2['title']?></a>
						<?php } ?>
					</div>
				<?php } ?>
				<?php if ($numbered_list){ ?>
					<div class="flex flex-col mt-[60px] md:mt-20">
						<?php $c = 1; ?>
						<?php foreach ($numbered_list as $l) { ?>
							<div class="flex gap-x-5 mb-4">
								<span class="font-medium min-w-[30px] md:min-w-[64px]"><?= sprintf("%02d", $c)?></span>
								<span class="font-medium"><?=$l['title']?></span>
							</div>
							<?php $c++; ?>
						<?php	} ?>
					</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php return;