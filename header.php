<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'gavdi_next_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'gavdi_next_header' ); ?>

	<header id="site-header" class="fixed w-full z-10 group header--white animate animate-down">
		<div class="mx-auto container">
			<div class="grid grid-cols-12 gap-x-5 md:gap-x-10 py-[15px] items-center">
				<div class="col-span-6 flex justify-between items-center relative z-[6]">
					<a href="<?php echo get_bloginfo( 'url' ); ?>" class="text-dark-warm-grey group-[.header--white]:text-white transition ease-in-out">
						<svg width="126" height="30" viewBox="0 0 126 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.50744 10.1628C3.30824 10.1628 0 13.4155 0 17.434C0 21.4525 2.3541 24.1316 6.87065 24.1316C8.52477 24.1316 9.73376 24.0042 9.73376 24.0042C9.47961 25.2163 8.9067 26.1729 6.80746 26.1729C4.70821 26.1729 3.24505 25.6625 3.24505 25.6625L2.60896 29.3622C2.60896 29.3622 4.26308 29.9999 6.68038 29.9999C11.5157 29.9999 14.1239 28.0227 14.1239 22.8561V16.7329C14.06 12.651 11.5157 10.1635 7.50744 10.1635V10.1628ZM9.79765 20.3045H7.82548C5.3443 20.3045 4.32627 18.7102 4.32627 17.1151C4.32627 15.5201 5.53527 14.0532 7.06162 14.0532C8.58796 14.0532 9.79696 14.9464 9.79696 17.2426V20.3045H9.79765ZM54.2041 10.4816H52.2319C47.5876 10.4816 44.4064 13.5436 44.4064 17.5614C44.4064 21.5793 46.9515 24.4497 51.4049 24.4497C55.6041 24.4497 58.4033 22.0262 58.4033 16.4767V4.93213H54.1409V10.4816H54.2048H54.2041ZM54.2041 17.3066C54.2041 19.5394 53.059 20.3045 51.5319 20.3045C49.6869 20.3045 48.7327 19.029 48.7327 17.434C48.7327 15.6482 49.9417 14.3087 52.2951 14.3087H54.2034V17.3066H54.2041ZM64.383 4.93213H60.0567V8.75921H64.383V4.93213ZM66.7371 20.3038C64.9559 20.3038 64.3198 19.2831 64.3198 16.987V10.4809H60.0574V18.071C60.0574 22.0896 61.9657 24.1302 65.9739 24.1302H67.31V20.3031H66.7371V20.3038ZM22.5216 10.1628C18.3224 10.1628 15.0142 13.2247 15.0142 17.2426C15.0142 21.2604 17.3683 24.1309 21.8848 24.1309H29.0735V16.9237C29.0096 12.8418 26.4653 10.1628 22.5209 10.1628H22.5216ZM24.7486 20.3045H22.7765C20.2953 20.3045 19.2773 18.7102 19.2773 17.1151C19.2773 15.5201 20.4863 14.0532 22.0126 14.0532C23.5389 14.0532 24.7479 14.9464 24.7479 17.2426V20.3045H24.7486ZM39.4448 11.6297C39.4448 18.3906 36.8997 19.8575 36.8997 19.8575C36.8997 19.8575 34.3546 18.454 34.3546 11.6297C34.3546 11.2468 34.3546 11.0553 34.4185 10.4816H29.8381V10.992C29.8381 23.1743 36.8365 24.6419 36.8365 24.6419C36.8365 24.6419 43.962 23.175 43.962 10.992V10.4816H39.3816C39.4455 11.056 39.4455 11.2468 39.4455 11.6297H39.4448Z" fill="currentColor"/>
						<path d="M72.8498 4.08466H76.0367L83.6745 16.4755C84.4163 17.6569 85.1307 18.8657 85.8725 20.0471C85.8725 18.7009 85.8175 17.492 85.8175 16.1458V4.08466H88.4276V23.7012H85.1582L77.5478 11.3928C76.806 10.2389 76.1466 9.05747 75.4048 7.90356C75.4048 9.27727 75.4598 10.5685 75.4598 11.9423V23.7012H72.8498V4.08466ZM104.002 19.4702C103.206 22.4923 100.815 24.0309 97.6559 24.0309C93.4523 24.0309 90.6774 20.9812 90.6774 16.5304C90.6774 12.2445 93.5897 9.16737 97.6009 9.16737C102.601 9.16737 104.167 13.1786 104.222 16.8326V17.2722H93.0677C93.26 20.2394 95.0733 21.9703 97.6009 21.9703C99.4966 21.9703 101.09 21.2285 101.585 19.4702H104.002ZM93.0952 15.2941H101.722C101.502 12.8214 100.129 11.2005 97.6009 11.2005C95.0458 11.2005 93.4248 12.8489 93.0952 15.2941ZM104.606 23.7012L109.771 16.4205L104.881 9.49706H107.875L111.255 14.4424L114.634 9.49706H117.629L112.766 16.3931L117.903 23.7012H114.909L111.255 18.3712L107.601 23.7012H104.606ZM123.153 19.7174C123.153 20.9812 123.868 21.6681 124.967 21.6681H125.956V23.7012H124.719C121.972 23.7012 120.736 22.0802 120.736 19.8823V11.5301H118.62V9.49706H120.736V6.17269L123.153 5.07373V9.49706H125.873V11.5301H123.153V19.7174Z" fill="currentColor"/>
						</svg>
					</a>
				</div>
				<div class="col-span-6 flex justify-end lg:justify-between items-center">
				<?php
					wp_nav_menu(
						array(
							'container_id'    => 'primary-menu',
							'container_class' => 'hidden bg-white text-center opacity-0 transition-opacity font-heading fixed flex justify-center items-center z-[5] w-screen h-screen top-0 left-0 text-5xl lg:text-sm lg:w-full lg:h-full lg:font-default lg:text-left lg:relative lg:opacity-100 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
							'menu_class'      => 'lg:flex gap-x-5 text-dark-warm-grey group-[.header--white]:text-white font-medium text-5xl  lg:text-sm mb-[5px] lg:mb-0',
							'theme_location'  => 'primary',
							'li_class'        => '',
							'fallback_cb'     => false,
						)
					);
					?>
					<a id="header-contact" href="/contact-us" class="header-cta hidden lg:block font-medium text-sm text-dark-warm-grey group-[.header--white]:text-white"><?=__('Contact us', 'gavdi_next')?></a>
					<a id="overlay-close" href="javascript:void(0)" class="header-cta font-medium text-sm hidden text-dark-warm-grey group-[.header--white]:text-white"><?=__('Close', 'gavdi_next')?></a>
					<div class="lg:hidden relative z-[6]">
						<a href="#" class="text-dark-warm-grey group-[.header--white]:text-white" aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg id="hamburger" class="flex" width="28" height="14" viewBox="0 0 28 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M28 1H0" stroke="currentColor" stroke-width="2"/>
							<path d="M28 7H0" stroke="currentColor" stroke-width="2"/>
							<path d="M28 13H0" stroke="currentColor" stroke-width="2"/>
							</svg>
							<svg id="cross" class="hidden" width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M21.5 1L5.5 17" stroke="currentColor" stroke-width="2"/>
							<path d="M21.5 17L5.5 0.999999" stroke="currentColor" stroke-width="2"/>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="content" class="site-content flex-grow">
		<?php do_action( 'gavdi_next_content_start' ); ?>
		<main>
