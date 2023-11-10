(function($){
		
		/**
		 * initializeBlock
		 *
		 * Adds custom JavaScript to the block HTML.
		 *
		 * @date    15/4/19
		 * @since   1.0.0
		 *
		 * @param   object $block The block jQuery element.
		 * @param   object attributes The block attributes (only available when editing).
		 * @return  void
		 */
		var initializeBlock = function( $block ) {
		
		
			let tickerSpeed = 1.5;

			let flickity = null;
			let isPaused = false;
			const slideshowEl = document.querySelector('.js-slideshow');
			const overlayClose = document.querySelector('#overlay-close');
			const slideElements = slideshowEl.querySelectorAll('.slide');

			const update = () => {
				if (isPaused) return;
				if (flickity.slides) {
					flickity.x = (flickity.x - tickerSpeed) % flickity.slideableWidth;
					flickity.selectedIndex = flickity.dragEndRestingSelect();
					flickity.updateSelectedSlide();
					flickity.settle(flickity.x);
				}
				window.requestAnimationFrame(update);
			};

			const pause = () => {
				isPaused = true;
			};

			const play = () => {
				if (isPaused) {
					isPaused = false;
					window.requestAnimationFrame(update);
				}
			};

			flickity = new Flickity(slideshowEl, {
				autoPlay: false,
				draggable: true,
				wrapAround: true,
				prevNextButtons: false,
				accessibility: false,
					 friction: 0.2,
					freeScroll: true,
				});
			flickity.x = 0;
			
			slideshowEl.addEventListener('click', function(){
				slideshowEl.classList.add('pause');
				pause();
			});
			overlayClose.addEventListener('click', function(){
				slideshowEl.classList.remove('pause');
				play();
			});



			slideshowEl.addEventListener('mouseenter', function() {
				if (!slideshowEl.classList.contains('pause')) {
					pause();
				}
			}, false);

			slideshowEl.addEventListener('focusin', function() {
				if (!slideshowEl.classList.contains('pause')) {
					pause();
				}
			}, false);

			slideshowEl.addEventListener('mouseleave', function() {
				if (!slideshowEl.classList.contains('pause')) {
					play();
				}
			}, false);

			slideshowEl.addEventListener('focusout', function() {
				if (!slideshowEl.classList.contains('pause')) {
					play();
				}
			}, false);

			flickity.on('dragStart', () => {
				isPaused = true;
				flickity.slider.style.pointerEvents = 'none';
			});

			flickity.on('dragEnd', () => {
				flickity.slider.style.pointerEvents = 'auto';
				play();
				update();
			});

			// slideshowEl.addEventListener('mouseenter', pause, false);
			// slideshowEl.addEventListener('focusin', pause, false);
			// slideshowEl.addEventListener('mouseleave', play, false);
			// slideshowEl.addEventListener('focusout', play, false);
					
			update();


			$('.slide').on('click', function(){
				//pause();
			});

		}

		// Initialize each block on page load (front end).
		$(document).ready(function(){
				$('.block-sliding-card').each(function(){
						initializeBlock( $(this) );
				});
		});


})(jQuery);