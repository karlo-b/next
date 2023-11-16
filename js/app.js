/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

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
      document.body.classList.add('service-open');
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
      document.body.classList.remove('service-open');
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
    document.body.classList.add('service-open');
    document.documentElement.style.overflow = 'hidden';
    document.getElementById("site-header").classList.remove("on");
    animateElements.forEach(function (element) {
      element.classList.remove('on');
    });
  }
  function hideFullscreenSection() {
    var fullscreenSection = document.getElementById('fullscreen-section');
    var parentElement = document.querySelector('.block-hero');
    var animateElements = parentElement.querySelectorAll('.animate');
    if (fullscreenSection) {
      fullscreenSection.classList.add('fadeout');
      var expirationDate = new Date();
      expirationDate.setDate(expirationDate.getDate() + 7);
      document.cookie = "fullscreen-loaded=true; expires=" + expirationDate.toUTCString() + "; path=/";
      document.getElementById("site-header").classList.add("on");
      document.body.style.overflowY = 'visible';
      document.body.classList.remove('service-open');
      document.documentElement.style.overflow = 'visible';
      animateElements.forEach(function (element) {
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
window.addEventListener('scroll', function () {
  var scrollPosition = window.scrollY;
  var fadingElement = document.getElementById('hero-graphic');

  // Adjust the opacity based on scroll position
  fadingElement.style.opacity = 1 - scrollPosition / 500;
});

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/editor-style.css":
/*!****************************************!*\
  !*** ./resources/css/editor-style.css ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/editor-style": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkgavdi_next"] = self["webpackChunkgavdi_next"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/editor-style","css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/editor-style","css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/editor-style","css/app"], () => (__webpack_require__("./resources/css/editor-style.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;