window.addEventListener('load', function () {
	var main_navigation = document.querySelector('#primary-menu');
	var hamburger = document.querySelector('#hamburger');
	var cross = document.querySelector('#cross');

	document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
		e.preventDefault();
		main_navigation.classList.toggle('hidden');
		main_navigation.classList.toggle('open');
		hamburger.classList.toggle('hidden');
		cross.classList.toggle('hidden');

		document.body.classList.toggle("dark-nav");
	});
});
function handleHeaderColorChange() {
	var inColorMenu = false; // Initialize a variable to store if we are in color-menu
	var top_of_screen = window.scrollY; // Get the current scroll position

	// Get all elements with the specified class
	var colorMenuElements = document.querySelectorAll('.entry-content > .dark-section');

	// Loop through each color-menu element and check if we are in one
	colorMenuElements.forEach(function (element) {
		var top_of_element = element.offsetTop - 30;
		var bottom_of_element = top_of_element + element.offsetHeight;

		// If we are in a color-menu element, set our variable to true and stop processing
		if (top_of_screen > top_of_element && top_of_screen < bottom_of_element) {
			inColorMenu = true;
			return; // No need to return anything to break from the loop in this case
		}
	});

	if (inColorMenu) {
		document.getElementById("site-header").classList.add("header--white");
	} else {
		document.getElementById("site-header").classList.remove("header--white");
	}
}

// Call the function on initial load

window.addEventListener('load', function () {
	handleHeaderColorChange();
});

// Add an event listener for the 'scroll' event to call the function on scroll
window.addEventListener('scroll', handleHeaderColorChange);
window.addEventListener('load', function () {
	var root = document.documentElement;
	var body = document.body;
	var pages = document.querySelectorAll(".section");
	var tiles = document.querySelectorAll(".tile");
	var cardContent = document.querySelectorAll(".card--content");
	var headerContact = document.getElementById("header-contact");
	var menuToggle = document.getElementById("primary-menu-toggle");
	var overlayClose = document.getElementById("overlay-close");
	for (var i = 0; i < tiles.length; i++) {
		addListeners(tiles[i], pages[i]);
	}
	function addListeners(tile, page) {
		tile.addEventListener("click", function () {

			if (tile.classList.contains("bg-light-warm-grey")) {
				// Add class "dark-nav" to the body element
				document.body.classList.add("dark-nav");
			}

			animateHero(tile, page);
			document.getElementById("site-header").classList.add("header--white");
			headerContact.classList.add("overlay-hidden");
			menuToggle.classList.add("overlay-hidden");
			overlayClose.classList.remove("hidden");
			var timelineContentIn = new TimelineMax();
			timelineContentIn.fromTo(cardContent, 1, {
				opacity: 0,
				y: 44
			}, {
				opacity: 1,
				y: 0
			});
			tile.classList.add("open");
			page.classList.add("open");
			document.body.style.overflowY = 'hidden';
			document.documentElement.style.overflow = 'hidden';
		});

		//var closeButton = page.querySelector(".close");
		// if (closeButton) {
		// 	closeButton.addEventListener("click", function(event) {
		// 		event.stopPropagation(); // Prevent the click event from propagating to the page
		// 		var timelineContentOut = new TimelineMax();
		// 		timelineContentOut.fromTo(cardContent, .1, {opacity: 1, y:0}, {opacity:0, y:44});
		// 		setTimeout(() => {	animateHero(page, tile); }, 100);
		// 		document.getElementById("site-header").classList.remove("header--white");
		// 		headerContact.classList.remove("hidden");
		// 		overlayClose.classList.add("hidden");
		// 	});
		// 	}

		 function closeOverlay() {
				var timelineContentOut = new TimelineMax();
				timelineContentOut.fromTo(cardContent, .1, {
						opacity: 1,
						y: 0
				}, {
						opacity: 0,
						y: 44
				});

				var openTile = document.querySelector(".tile.open");
				var openPage = document.querySelector(".section.open");

				if (openTile && openPage) {
						setTimeout(function () {
								animateHero(openPage, openTile);
						}, 100);
				}

				document.getElementById("site-header").classList.remove("header--white");
				headerContact.classList.remove("overlay-hidden");
				menuToggle.classList.remove("overlay-hidden");
				overlayClose.classList.add("hidden");
				openTile.classList.remove("open");
				openPage.classList.remove("open");
				document.body.style.overflowY = 'visible';
				document.documentElement.style.overflow = 'visible';

				if (document.body.classList.contains("dark-nav")) {
						document.body.classList.remove("dark-nav");
				}
		}

		overlayClose.addEventListener("click", function (event) {
				event.stopPropagation();
				closeOverlay();
		});

		document.addEventListener('keydown', function (event) {
				if (event.key === 'Escape' || event.keyCode === 27) {
						closeOverlay();
				}
		});
	}

	function animateHero(fromHero, toHero) {
		var clone = fromHero.cloneNode(true);
		var from = calculatePosition(fromHero);
		var to = calculatePosition(toHero);
		TweenLite.set([fromHero, toHero], {
			visibility: "hidden"
		});
		TweenLite.set(clone, {
			position: "absolute",
			margin: 0
		});
		body.appendChild(clone);
		var style = {
			x: to.left - from.left,
			y: to.top - from.top,
			width: to.width,
			height: to.height,
			autoRound: false,
			ease: Power1.easeOut,
			onComplete: onComplete
		};
		TweenLite.set(clone, from);
		TweenLite.to(clone, 0.3, style);
		function onComplete() {
			TweenLite.set(toHero, {
				visibility: "visible"
			});
			body.removeChild(clone);
		}
	}
	function calculatePosition(element) {
		var rect = element.getBoundingClientRect();
		var scrollTop = window.pageYOffset || root.scrollTop || body.scrollTop || 0;
		var scrollLeft = window.pageXOffset || root.scrollLeft || body.scrollLeft || 0;
		var clientTop = root.clientTop || body.clientTop || 0;
		var clientLeft = root.clientLeft || body.clientLeft || 0;
		return {
			top: Math.round(rect.top + scrollTop - clientTop),
			left: Math.round(rect.left + scrollLeft - clientLeft),
			height: rect.height,
			width: rect.width
		};
	}
});
window.addEventListener('load', function () {

	var fullscreenSection = document.getElementById('fullscreen-section');
	var parentElement = document.querySelector('.block-hero');
	var animateElements = parentElement.querySelectorAll('.animate');
	
	if (fullscreenSection) {
		document.body.style.overflowY = 'hidden';
		document.documentElement.style.overflow = 'hidden';
		document.getElementById("site-header").classList.remove("on");
		 animateElements.forEach(function(element) {
				element.classList.remove('on');
		});
	}
	function hideFullscreenSection() {
		var fullscreenSection = document.getElementById('fullscreen-section');
		var parentElement = document.querySelector('.block-hero');
		var animateElements = parentElement.querySelectorAll('.animate');
		if (fullscreenSection) {
			fullscreenSection.classList.add('fadeout');
			const expirationDate = new Date();
			expirationDate.setDate(expirationDate.getDate() + 7);
			document.cookie = "fullscreen-loaded=true; expires=" + expirationDate.toUTCString() + "; path=/";
			document.getElementById("site-header").classList.add("on");
			document.body.style.overflowY = 'visible';
			document.documentElement.style.overflow = 'visible';
			 animateElements.forEach(function(element) {
					element.classList.add('on');
			});
		}
	}
	// Call the hideFullscreenSection function after 8 seconds (8000 milliseconds)
	setTimeout(hideFullscreenSection, 5000);
});

// Animations

function checkElementsInView() {
	var pageTop = window.pageYOffset;
	var pageBottom = pageTop + window.innerHeight;
	var animateElements = document.querySelectorAll('.animate[class*="animate-"]');
	animateElements.forEach(function (element) {
		var elementTop = element.getBoundingClientRect().top + pageTop;
		if (elementTop < pageBottom) {
			element.classList.add('on');
		} else {
			element.classList.remove('on');
		}
	});
}
document.addEventListener('DOMContentLoaded', function () {
	checkElementsInView();
});
window.addEventListener('scroll', function () {
	checkElementsInView();
});

window.addEventListener('scroll', function() {
		var scrollPosition = window.scrollY;
		var fadingElement = document.getElementById('hero-graphic');

		// Adjust the opacity based on scroll position
		fadingElement.style.opacity = 1 - (scrollPosition / 500);
});
