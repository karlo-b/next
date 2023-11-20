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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-hero-article-' . $block['id'];
$block_class  = 'block-hero-article';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$heading      = get_field( 'heading' ) ? : get_the_title();
$image        = get_field( 'image' ) ? :'';
$background   = (get_field('background')) ? : '';
$text_color   = ($background == "white") ? 'text-dark-warm-grey' : 'text-white';
$dark_section = ($background !="white") ? 'dark-section' : '';
$border       = ($background !="white") ? 'border-'.$background.'-700 hover:border-white' : 'border-dark-warm-grey-700 hover:border-dark-warm-grey';
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> bg-<?=$background?> <?=$text_color?> <?=$dark_section?> ">
	<div class="container relative">
		<div class="flex flex-col min-h-screen items-center">
			<?php if ($image){ ?>
				<div class="my-auto w-1/2 sm:w-1/4 lg:w-1/6 img-reveal">
					<?= wp_get_attachment_image( $image, 'hero-articles', '', array( "class" => "" ) ) ?>
				</div>
			<?php } ?>
		<?php if ($heading ){ ?>
			<div class="col-span-12">
				<h1 class="mt-auto mb-0 fontsize-10vw text-center <?=$text_color?>"><?=$heading?></h1>
			</div>
			
		<?php } ?>
		<div class="col-span-12 my-5 flex justify-center">
			<a href="#" class="scroll-further border-b transition-all <?=$border?>"><?=__('Scroll futher', 'gavdi-next')?></a>
		</div>
		</div>
	</div>
</div>


<?php return;





