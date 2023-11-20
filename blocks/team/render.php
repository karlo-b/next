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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-services-' . $block['id'];
$block_class  = 'wp-block block-services';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$select_services = (!empty(get_field('select_services'))) ? get_field('select_services') : '';
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> bg-white py-10 md:py-[60] md:mt-[90px] mt-[100px]">
	<div class="container">
		<div class="grid grid-cols-12 lg:gap-x-10 gap-x-5">
			<div class="col-span-12 md:col-span-3">
				<h2 class="text-dark-warm-grey text-[32px]">What is SAP<br> Succesfactors?</h2>
			</div>
			<div class="col-span-12 md:col-start-7 md:col-end-13 mt-[60px] md:my-0">
				<div class="grid grid-cols-12 text-dark-warm-grey">
					<div class="col-span-12 mb-5 md:mb-[30px]">
						<div class="subheadline-l">Sap as a businessmodel</div>
					</div>
					<div class="col-span-12 md:col-span-6 md:pr-[30px]">
						<div class="body-s ">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. </p>
						</div>
					</div>
					<div class="col-span-12 md:col-span-6 md:pr-[30px]">
						<div class="body-s lc-reset">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="block-services-grid my-10 md:my-[60px]">
	<div class="container">
		<div class="flex flex-col md:flex-row md:items-end md:justify-between mb-10">
			<h2 class="text-dark-warm-grey text-[32px] md:text-[48px] mb-[15px] md:mb-0">List of services<sup class="text-[18px] [md:text-[24px] -top-3 md:-top-5">(8)</sup></h2>
			<span class="body-s text-dark-warm-grey max-w-[192px]">We offer 8 different services all distinct and relevant</span>
		</div>
		<?php if ($select_services){ ?>
			<div class="grid grid-cols-12 lg:gap-x-10 gap-x-5 gap-y-[15px] md:gap-y-10">
				<?php foreach ($select_services as $s) { ?>
					<?php 
					$title            = get_the_title($s);
					$service_title    = (get_field('title', $s ) ) ? : '';
					$background_color = (get_field('background_color', $s ) ) ? 'bg-'.get_field('background_color', $s ) : '';
					$text_color       = ($background_color == 'bg-light-warm-grey') ? 'text-dark-warm-grey' : 'text-white';
					$border_color       = ($background_color == 'bg-light-warm-grey') ? 'border-b border-dark-warm-grey-700' : 'border-b';
					$symbol           = (get_field('symbol', $s ) ) ? : '';
					$content_column_1 = (get_field('content_column_1', $s ) ) ? : '';
					$content_column_2 = (get_field('content_column_2', $s ) ) ? : '';
					?>
					<div class="col-span-6 md:col-span-3 card relative group">
						<div class="!absolute flex flex-col card--bg w-full h-full tile z-0 <?=$background_color?>"></div>
						<div class="flex flex-col h-full items-start pointer-events-none p-5 sm:p-10 md:p-5 lg:p-10 z-[1]">
							<div class="relative lg:mb-4 mb-[10px] text-[11px] sm:text-[14px] font-medium leading-none  <?=$text_color?>"><?=$title?></div>
							<?php if ($service_title){ ?>
								<h3 class="relative text-[12px] sm:text-[18px] lg:text-[24px] tracking-tight mb-2 md:mb-5 <?=$text_color?>"><?=$service_title?></h3>
							<?php } ?>
							<div class="relative inline-flex leading-none pb-1 text-[11px] md:text-[13px] invisible group-hover:visible <?=$text_color?> <?=$border_color?>"><?=__('Read more','gavdi-next')?></div>
							<div class="mt-auto w-full">
								<?php if ($symbol){ ?>
									<?=wp_get_attachment_image($symbol, 'full', '', ['class'=>'w-full h-full block relative'])?>
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
				$text_color       = ($background_color == 'bg-light-warm-grey') ? 'text-dark-warm-grey' : 'text-white';
				$symbol           = (get_field('symbol', $s ) ) ? : '';
				$content_column_1 = (get_field('content_column_1', $s ) ) ? : '';
				$content_column_2 = (get_field('content_column_2', $s ) ) ? : '';
				$grid_class       = ($content_column_2) ? ' md:grid-cols-2' : 'grid-cols-1';
				?>
			<div class="section flex items-center justify-center <?=$background_color?>">
				<div class="container mx-auto">
					<div class="card--content pt-[700px] md:pt-0 opacity-0 grid grid-cols-12 gap-x-5 md:gap-x-10 md:min-h-screen items-end pb-11">
						<div class="mb-10 md:mb-0 md:mt-0 col-span-8 md:col-span-3">
							<?php if ($symbol){ ?>
								<?=wp_get_attachment_image($symbol, 'full', '', ["class" => "w-full"])?>
							<?php } ?>
						</div>
						<div class="col-span-12 md:col-start-7 md:col-span-6">
							<?php if ($service_title){ ?>
								<h2 class="<?=$text_color?> mb-[60px] h3"><?=$service_title?></h2>
							<?php } ?>
							<div class="<?=$text_color?> mb-5 md:mb-[30px]"><?=__('Implementation', 'gavdi-next')?></div>
							<div class="grid gap-x-10 <?=$grid_class?>">
								<?php if ($content_column_1){ ?>
									<div class="<?=$text_color?> lg:pr-[30px] body-s flex flex-col">
										<?=$content_column_1?>
									</div>
								<?php } ?>
								<?php if ($content_column_2){ ?>
									<div class="<?=$text_color?> lg:pr-[30px] body-s flex flex-col">
										<?=$content_column_2?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>

<?php return;