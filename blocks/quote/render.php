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
$quote        = (get_field('quote')) ? : '';
$author       = (get_field('author')) ? : '';
$position     = (get_field('position')) ? : '';
$author_image = (get_field('author_image')) ? : '';
$background   = (get_field('background')) ? : '';
$border       = ($background !="white") ? 'border-'.$background.'-700' : 'border-dark-warm-grey-700';
$text_color   = ($background == "white") ? 'text-dark-warm-grey' : 'text-white';
$dark_section = ($background !="white") ? 'dark-section' : '';
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> bg-<?=$background?> <?=$text_color?> <?=$dark_section?>">
	<div class="container lg:px-0">
		<div class="min-h-screen flex flex-col justify-center lg:py-30 lg:px-[133px]">
			<div class="animate animate-up">
				<div class="w-10 h-10 flex items-center justify-center border <?=$border?> <?=$text_color?> mx-auto">
					<svg xmlns="http://www.w3.org/2000/svg" width="19" height="14" viewBox="0 0 19 14" fill="none">
					<path d="M2.82258 7.64144H7.06128V14H0.5V7.64144L5.26129 0H7.70001L2.82258 7.64144ZM13.6226 7.64144H17.8613V14H11.3V7.64144L16.0613 0H18.5L13.6226 7.64144Z" fill="currentColor"/>
					</svg>
				</div>
				<?php if ($quote ){ ?>
					<div class="my-10 lg:my-[70px] <?=$text_color?> quote text-center font-heading text-[28px] lg:text-[66px] leading-[110%]"><?=$quote?></div>
				<?php } ?>
				
				<div class="flex flex-col items-center">
					<?php if ($author_image){ ?>
						<?= wp_get_attachment_image( $author_image, 'quote-author', '',array( "class" => "w-[50px] h-[63px] mb-5" ) ) ?>
					<?php } ?>
					<?php if ($author){ ?>
						<h4 class="<?=$text_color?> tracking-tight font-medium text-sm"><?=$author?></h4>
					<?php } ?>
					<?php if ($position){ ?>
						<span class="<?=$text_color?>-700 text-sm"><?=$position?></span>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php return;