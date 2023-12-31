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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-hero-home-' . $block['id'];
$block_class  = 'block-hero-home';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$heading     = get_field( 'heading' ) ? : get_the_title();
$content     = get_field( 'content' ) ? : '';
$links       = (!empty(get_field( 'links' ))) ? get_field( 'links' )  : '';
$bottom_text = get_field( 'bottom_text' ) ? : '';
$news_card   = (!empty(get_field( 'news_card' ))) ? get_field( 'news_card' )  : '';

?>
<?php if (!isset($_COOKIE['fullscreen-loaded']) || $_COOKIE['fullscreen-loaded'] !== 'true') { ?>
	<div id="fullscreen-section" class="bg-bright-orange min-h-screen min-w-screen w-full flex items-center justify-center z-30 fixed pointer-events-none">
		<div class="container">
			<div class="grid grid-cols-12 lg:gap-x-10 gap-x-5">
					<div class="col-start-2 col-end-13 lg:col-start-3 lg:col-end-13 xl:col-start-4 xl:col-end-13">
						<h2 class="rw-sentence text-[26px] lg:text-[72px] text-white xl:min-w-[1000px]">The Next  
							<div class="rotate-words">
								<span> generation</span>
								<span> frontier</span>
								<span> transformation</span>
							</div>
						</h2>
					</div>
			</div>
		</div>
	</div>
<?php } ?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> bg-bright-orange dark-section relative">
	<div class="container relative z-[5] min-h-screen">
		<div class="grid grid-cols-12 gap-x-5 md:gap-x-10 relative">
			<?php if ($news_card ){?>
				<div class="row-span-2 col-span-12 md:col-span-6 flex items-end md:pb-11 order-2 md:order-1 mt-[60px] md:mt-0">
					<div class="sticky bottom-[44px] left-0 right-0 w-full">
						<div class="border border-bright-orange-700 hover:border-white transition-all p-5 flex gap-x-5 md:max-w-[376px] justify-between animate animate-up">
							<div>
								<?php if ($news_card ['heading']){ ?>
								<h3 class="h6 text-white mb-[15px]"><?=$news_card['heading']?></h3>
								<?php } ?>
								<?php if ($news_card['cta_link']){ ?>
									<a href="<?=esc_url($news_card ['cta_link']['url'])?>" class="text-white text-sm font-medium flex items-center gap-x-[5px]" target="<?=$news_card ['cta_link']['target']?>">
										<?=$news_card['cta_link']['title']?>
										<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
										<path d="M1 10H11" stroke="white" stroke-width="1.5"/>
										<path d="M10.5 2L6 6L1.5 2" stroke="white" stroke-width="1.5"/>
									</svg>
								</a>
								<?php } ?>
							</div>
							<?php if ($news_card['image']){ ?>
								<?= wp_get_attachment_image( $news_card['image'], 'news-card', '',array( "class" => "w-[86px] h-[86px]" ) ) ?>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="col-span-12 md:col-span-6 min-h-screen md:min-h-screen flex items-end lg:pb-11 order-0 md:order-2 pb-[15px] md:pb-0">
				<?php if ($heading){ ?>
					<h1 class="h2 text-white animate animate-up"><?=$heading?></h1>
				<?php } ?>
			</div>
			<div class="col-span-12 md:col-start-7 md:col-end-13 lg:py-[120px] order-3 mt-8 pb-24">
				<?php if ($content){ ?>
					<div class="text-white introduction lg:pr-[30px] mb-10">
						<?=$content?>
					</div>
				<?php } ?>
				<?php if ($links ){ ?>
					<div class="mb-10">
						<?php foreach ($links as $l) { ?>
							<a class="flex text-white h5 justify-between w-full items-center  pt-[10px] md:pt-[17px] pb-[30px] md:pb-10 border-t hover:border-white transition-all border-bright-orange-700" href="<?=$l['link']['url']?>" target="<?=$l['link']['target']?>">
								<span><?=$l['link']['title']?></span>
								<svg class="w-3 h-3 lg:w-[20px] lg:h-[20px]" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
								<path d="M1 20L19 1.5" stroke="white" stroke-width="2.25"/>
								<path d="M4 1.5H19V15.5" stroke="white" stroke-width="2.25"/>
								</svg>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
				<?php if ($bottom_text ){ ?>
					<div class="text-white subheadline-s text-right md:text-left"><?=$bottom_text?></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="hero-graphic" class="z-[0] pointer-events-none animate animate-fade hero__bg right-0 fixed top-0 left-1/2 transform -translate-x-1/2 -translate-0 w-full px-5 md:max-w-[778px]">
		<svg class="" width="778" height="783" viewBox="0 0 778 783"  preserveAspectRatio="xMinYMin" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M643.685 0H778C778 104.172 737.538 202.117 664.06 275.767C590.582 349.434 492.905 390 389 390V255.34C529.441 255.34 643.685 140.802 643.685 0Z" fill="#FF9D66"/>
			<path d="M134.315 393L-3.40948e-05 393C-2.49879e-05 497.172 40.4621 595.117 113.94 668.767C187.418 742.434 285.095 783 389 783L389 648.34C248.559 648.34 134.315 533.802 134.315 393Z" fill="#FF9D66"/>
		</svg>
	</div>
	</div>


<?php return;