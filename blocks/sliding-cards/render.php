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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-sliding-card-' . $block['id'];
$block_class  = 'block-sliding-card';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

$select_services = (!empty(get_field( 'select_services' ) ) ) ? get_field( 'select_services' ) : '';
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> mt-20 mb-20 lg:mt-40 lg:mb-[120px]">
	<div class="container mx-auto px-0 md:px-0">
		<?php if ($select_services ){ ?>
			<div class="slideshow js-slideshow">
			<?php foreach ($select_services as $s) { ?>
				<?php 
				$title            = get_the_title($s);
				$service_title    = (get_field('title', $s ) ) ? : '';
				$background_color = (get_field('background_color', $s ) ) ? 'bg-'.get_field('background_color', $s ) : '';
				$text_color       = ($background_color == 'bg-light-warm-grey') ? 'text-dark-warm-gray' : 'text-white';
				$symbol           = (get_field('symbol', $s ) ) ? : '';
				$content_column_1 = (get_field('content_column_1', $s ) ) ? : '';
				$content_column_2 = (get_field('content_column_2', $s ) ) ? : '';
				?>
				<div class="card relative slide">
					<div class="card--bg tile p-5 md:p-10 w-full <?=$background_color?>"></div>
					<div class="absolute top-0 left-0 w-full h-full p-5 md:p-10 pointer-events-none flex flex-col">
						<div class="md:mb-4 mb-[10px] text-sm font-medium <?=$text_color?>"><?=$title?></div>
						<?php if ($service_title){ ?>
							<h3 class="h6 <?=$text_color?> mb-5"><?=$service_title?></h3>
						<?php } ?>
						
						<div class="mt-auto">
							<?php if ($symbol){ ?>
								<?=wp_get_attachment_image($symbol, 'full')?>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
			<div class="page-container">
			<?php foreach ($select_services as $s) { ?>
				<?php 
					$service_title    = (get_field('title', $s ) ) ? : '';
					$background_color = (get_field('background_color', $s ) ) ? 'bg-'.get_field('background_color', $s ) : '';
					$text_color       = ($background_color == 'bg-light-warm-grey') ? 'text-dark-warm-gray' : 'text-white';
					$symbol           = (get_field('symbol', $s ) ) ? : '';
					$content_column_1 = (get_field('content_column_1', $s ) ) ? : '';
					$content_column_2 = (get_field('content_column_2', $s ) ) ? : '';
					?>
				<div class="section flex items-center justify-center <?=$background_color?>">
					<div class="container mx-auto">
						<div class="card--content opacity-0 grid grid-cols-12 gap-x-10 md:min-h-screen items-end pb-11">
							<div class="mt-[120px] md:mt-0 col-span-8 md:col-span-3">
								<?php if ($symbol){ ?>
									<?=wp_get_attachment_image($symbol, 'full', '', ["class" => "w-full"])?>
								<?php } ?>
							</div>
							<div class="col-span-12 md:col-start-7 md:col-span-6">
								<?php if ($service_title){ ?>
									<h2 class="<?=$text_color?> mb-[60px] h3"><?=$service_title?></h2>
								<?php } ?>
								<p class="<?=$text_color?> mb-[30px]"><?=__('Implementation', 'gavdi-next')?></p>
								<div class="grid md:grid-cols-2 gap-x-10">
									<div class="<?=$text_color?> lg:pr-[30px] body-s gap-y-5 flex flex-col">
										<?=	$content_column_1 ?>
									</div>
									<div class="<?=$text_color?> lg:pr-[30px] body-s gap-y-5 flex flex-col">
									<?=	$content_column_2 ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
			<div class="mt-10 lg:mt-[101px] lg:mb-10 flex justify-center">
				<a class="border text-dark-warm-grey border-dark-war-gray-700 py-3 px-4 font-medium text-sm" href="#">See all services</a>
			</div>
		</div>
		<?php } ?>
</div>

<?php return;