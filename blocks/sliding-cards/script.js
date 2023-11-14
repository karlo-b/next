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
				console.log(isPaused + 'isPaused');
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
				resize: false,
				wrapAround: true,
				prevNextButtons: false,
				accessibility: false,
				friction: 0.2,
				freeScroll: true,
				pageDots: false
				});
			flickity.x = 0;
			
			// Add a click event listener to capture regular clicks
			// slideshowEl.addEventListener('click', function() {
			// 	if (!slideshowEl.classList.contains('pause')) {
			// 		slideshowEl.classList.add('pause');
			// 		slideshowEl.classList.add('stuck');
			// 		console.log('pause on slideshowEl click');
			// 		pause();
			// 	}
			
			// });

			flickity.on( 'staticClick', function( event, pointer, cellElement, cellIndex ) {
			
			
					slideshowEl.classList.add('pause');
					slideshowEl.classList.add('stuck');
					console.log('pause on slideshowEl staticClick');
					pause();
				
			
			});

			document.addEventListener('keydown', function (event) {
					// Check if the pressed key is the Escape key (keycode 27)
					if (event.key === 'Escape' || event.keyCode === 27) {
						slideshowEl.classList.remove('pause');
						slideshowEl.classList.remove('stuck');
    
						// Adding a delay of 0.5 seconds before calling play()
						setTimeout(function() {
								play();
						}, 800); // 500 milliseconds is equal to 0.5 seconds
					}
			});

			
			overlayClose.addEventListener('click', function() {
					slideshowEl.classList.remove('pause');
					slideshowEl.classList.remove('stuck');
    
					// Adding a delay of 0.5 seconds before calling play()
					setTimeout(function() {
							play();
					}, 800); // 500 milliseconds is equal to 0.5 seconds
			});



			slideshowEl.addEventListener('mouseenter', function() {
					slideshowEl.classList.add('pause');
					console.log('pause on mouseenter');
					pause();
				
			}, false);


			slideshowEl.addEventListener('mouseleave', function() {
				console.log('play on mouseleave');
				if (slideshowEl.classList.contains('pause') && !slideshowEl.classList.contains('stuck')) {
					isPaused = true;
					slideshowEl.classList.remove('pause');
					play();
				}
			}, false);

			flickity.on('dragStart', () => {
				//isPaused = true;
				console.log('pause on dragStart');
				pause();
				flickity.slider.style.pointerEvents = 'none';
			});

			flickity.on('dragEnd', () => {
				console.log('play on dragEnd');
				slideshowEl.classList.remove('pause');
				slideshowEl.classList.remove('stuck');
				flickity.slider.style.pointerEvents = 'auto';
				play();
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