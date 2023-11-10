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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-cotnent-' . $block['id'];
$block_class  = 'wp-block block-content';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> lg:mt-[120px] lg:mb-[120px]">
		<div class="container">
			<div class="grid grid-cols-12 lg:gap-x-10 gap-x-5">
				<div class="col-span-12 md:col-span-2 mb-5 md:mb-0">
					<div class="subheadline-l text-dark-warm-grey">Our values</div>
				</div>
				<div class="col-span-12 md:col-start-7 md:col-end-13 mb-[10px] md:mb-0">
					<h2 class="text-h4 text-dark-warm-grey">SAP excels in streamlining business processes, enhancing operational efficiency, and promoting data-driven.</h2>
				</div>
				<div class="col-span-12 md:col-start-7 md:col-end-13 py-10 lg:py-[60px]">
					<div class="grid grid-cols-2 lg:gap-x-10 gap-x-5 text-dark-warm-grey lg:gap-y-[60px]">
						<div class="col-span-2 md:col-span-1 md:pr-[30px]">
							<div class="mb-[10px] subheadline-s">Quality Assurance</div>
							<p class="body-s">Uphold a commitment to rigorous testing and best practices to deliver SAP solutions with the highest quality. Quality assurance efforts reduce</p>
						</div>
						<div class="col-span-2 md:col-span-1 md:pr-[30px]">
							<div class="mb-[10px] subheadline-s">Quality Assurance</div>
							<p class="body-s">Uphold a commitment to rigorous testing and best practices to deliver SAP solutions with the highest quality. Quality assurance efforts reduce</p>
						</div>
						<div class="col-span-2 md:col-span-1 md:pr-[30px]">
							<div class="mb-[10px] subheadline-s">Quality Assurance</div>
							<p class="body-s">Uphold a commitment to rigorous testing and best practices to deliver SAP solutions with the highest quality. Quality assurance efforts reduce</p>
						</div>
						<div class="col-span-2 md:col-span-1 md:pr-[30px]">
							<div class="mb-[10px] subheadline-s">Quality Assurance</div>
							<p class="body-s">Uphold a commitment to rigorous testing and best practices to deliver SAP solutions with the highest quality. Quality assurance efforts reduce</p>
						</div>
						<div class="col-span-2 md:col-span-1 md:pr-[30px]">
							<div class="mb-[10px] subheadline-s">Quality Assurance</div>
							<p class="body-s">Uphold a commitment to rigorous testing and best practices to deliver SAP solutions with the highest quality. Quality assurance efforts reduce</p>
						</div>
						<div class="col-span-2 md:col-span-1 md:pr-[30px]">
							<div class="mb-[10px] subheadline-s">Quality Assurance</div>
							<p class="body-s">Uphold a commitment to rigorous testing and best practices to deliver SAP solutions with the highest quality. Quality assurance efforts reduce</p>
						</div>
						<div class="col-span-2">
							<a class="font-medium text-sm inline-flex gap-x-[8px] items-center py-[5px] border-b-2 hover:border-dark-warm-grey-700 transition-all border-dark-warm-grey-300" href="#">
								<span>Read about our values</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
								<path d="M1 9L9 1" stroke="#7E6868" stroke-width="1.5"/>
								<path d="M2.25 0.75H9.25V7.75" stroke="#7E6868" stroke-width="1.5"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

<?php return;