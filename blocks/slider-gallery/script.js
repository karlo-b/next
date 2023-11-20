(function($) {
		// Function to initialize each slideshow block
		var initializeBlock = function($block) {
				let tickerSpeed = 1.5;
				let flickity = null;
				let isPaused = false;
        
				// Find the specific slideshow elements within the current block
				const slideshowEl = $block.find('.gallery-slideshow').get(0);
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
						resize: false,
						wrapAround: true,
						prevNextButtons: false,
						accessibility: false,
						friction: 0.2,
						freeScroll: true,
						pageDots: false
				});

				flickity.x = 0;

				flickity.on('staticClick', function(event, pointer, cellElement, cellIndex) {
						slideshowEl.classList.add('pause');
						console.log('pause on slideshowEl staticClick');
						pause();
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

				update();
		};

		// Initialize each block on page load (front end).
		$(document).ready(function() {
				$('.block-slider-gallery').each(function() {
						initializeBlock($(this));
				});
		});

})(jQuery);