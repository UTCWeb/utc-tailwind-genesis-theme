/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./js/global.js":
/*!**********************!*\
  !*** ./js/global.js ***!
  \**********************/
/***/ (() => {

/**
 * This script adds the jquery effects to the UTC Tailwind Genesis Theme.
 *
 * @package UTC\JS
 * @author StudioPress/Bridget Hornsby
 * @license GPL-2.0-or-later
 */
(function ($) {
  // Cache DOM selectors.
  var $container = $(".site-container"),
      $header = $(".site-header"),
      $hsToggle = $(".toggle-header-search"),
      $hsWrap = $("#header-search-wrap"),
      $hsInput = $hsWrap.find('input[type="search"]'); // Make sure JS class is added.

  $(document).ready(function () {
    $("body").addClass("js");
    $('#menu-main-menu').css('display', 'block');
  }); // Run on page scroll.

  $(window).scroll(function () {
    // Toggle header class after threshold point.
    if (50 < $(document).scrollTop()) {
      $(".site-container").addClass("shadow");
    } else {
      $(".site-container").removeClass("shadow");
    }
  });
  /*****************Important Search functionality****************/
  // Handler for click a show/hide button.

  $hsToggle.on("click", function (event) {
    event.preventDefault();

    if ($(this).hasClass("close")) {
      hideSearch();
    } else {
      showSearch();
    }
  }); // Handler for pressing show/hide button.

  $hsToggle.on("keydown", function (event) {
    // If tabbing from toggle button, and search is hidden, exit early.
    if (9 === event.keyCode && !$header.hasClass("search-visible")) {
      return;
    }

    event.preventDefault();
    handleKeyDown(event);
  }); // Hide search when tabbing or escaping out of the search bar.

  $hsInput.on("keydown", function (event) {
    // Tab: 9, Esc: 27.
    if (9 === event.keyCode || 27 === event.keyCode) {
      hideSearch(event.target);
    }
  }); // Hide search on blur, such as when clicking outside it.

  $hsInput.on("blur", hideSearch); // Helper function to show the search form.

  function showSearch() {
    $header.addClass("search-visible");
    $hsWrap.slideDown("fast").find('input[type="search"]').focus();
    $hsToggle.attr("aria-expanded", true);
  } // Helper function to hide the search form.


  function hideSearch() {
    $hsWrap.slideUp("fast").parents(".site-header").removeClass("search-visible");
    $hsToggle.attr("aria-expanded", false);
  } // Keydown handler function for toggling search field visibility.


  function handleKeyDown(event) {
    // Enter/Space, respectively.
    if (13 === event.keyCode || 32 === event.keyCode) {
      event.preventDefault();

      if ($(event.target).hasClass("close")) {
        hideSearch();
      } else {
        showSearch();
      }
    }
  }
  /*****************Important Main Menu functionality****************/


  $(".genesis-nav-menu.menu-primary").addClass("level-1");
  $(".genesis-nav-menu.menu-primary > li.menu-item-has-children > .sub-menu").addClass("level-2");
  $(".genesis-nav-menu.menu-primary > li.menu-item-has-children").each(function () {
    $(this).click(function () {
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $(this).parent().removeClass('open-sub-menu');
      } else {
        $(this).parent().find('li.active').removeClass('active');
        $(this).addClass('active');

        if ($(this).is(":last-child")) {
          $(this).parent().addClass('open-sub-menu');
        } else {
          $(this).parent().removeClass('open-sub-menu');
        }
      }
    });
  });
  /*****************Convert categories and archive lists into ul menus****************/

  $('section.widget_categories, section.widget_archive').addClass('widget_nav_menu widget_converted');
  $(".widget_categories .widget-wrap > ul").wrap("<ul class='menu'><li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children level-1'>Select a category</li></ul>");
  $(".widget_archive .widget-wrap > ul").wrap("<ul class='menu'><li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children level-1'>Select a month</li></ul>");
  $('.widget_categories .widget-wrap ul ul, .widget_archive .widget-wrap ul ul').addClass('sub-menu');
  $('.sub-menu').each(function () {
    $(this).removeClass('children');
  });
  $('.cat-item, .widget_archive li').addClass('menu-item menu-item-type-custom menu-item-object-custom');
  $('.cat-item.menu-item').each(function () {
    $(this).removeClass('cat-item');
  });
  $('.sub-menu').parent().addClass('menu-item-has-children');
  $(".sidebar .widget_nav_menu").each(function () {
    if (!$(this).hasClass("widget_converted")) {
      $(this).addClass('navigation_widget');
      $('body').addClass('has_navigation_widget');
    }

    $('.sidebar-primary .widget_nav_menu li li.has-children').toggle(function () {
      $(this).addClass("active");
    });
  });
  $('<span class="arrow-indicator"></span>').appendTo('.sidebar-primary .widget_nav_menu li.menu-item-has-children');
  $(".sidebar-primary .widget_nav_menu li.level-1:contains('Select a category')").html(function (_, html) {
    return html.replace(/(Select a category)/g, '<span class="select-text">$1</span>');
  });
  $(".sidebar-primary .widget_nav_menu li.level-1:contains('Select a month')").html(function (_, html) {
    return html.replace(/(Select a month)/g, '<span class="select-text">$1</span>');
  });
  $('.widget_converted li.level-1 span').click(function () {
    $(this).parent().toggleClass('active');
  });
  $('.widget_nav_menu li:not(.level-1) .arrow-indicator').addClass('sub-level');
  $('.widget_nav_menu li .arrow-indicator.sub-level').parent().addClass('sub-menu-closed');
  $('.widget_nav_menu li .arrow-indicator.sub-level').click(function () {
    if ($(this).parent().hasClass('sub-menu-closed')) {
      $(this).parent().addClass('sub-menu-open').removeClass('sub-menu-closed');
    } else {
      $(this).parent().removeClass('sub-menu-open').addClass('sub-menu-closed');
    }
  });
  /*****************Make sidebar menus reponsive****************/

  $('#left-footer-menu').parent().parent().parent().attr('id', "footer-menus");
  $('#left-footer-map').parent().parent().parent().attr('id', "footer-map");
  $('aside #footer-menus, aside #footer-map').remove();
  /*****************Modernize the share button****************/

  $('<i class="fa fa-share-alt-square utc-share" title="Share this article."></i>').appendTo('a.addtoany_share');
  /*****************Add back to top eased scrolling functionality****************/

  jQuery(document).ready(function ($) {
    // Scroll (in pixels) after which the "To Top" link is shown
    var offset = 300,
        //Scroll (in pixels) after which the "back to top" link opacity is reduced
    offset_opacity = 1200,
        //Duration of the top scrolling animation (in ms)
    scroll_top_duration = 700,
        //Get the "To Top" link
    $back_to_top = $(".to-top"); //Visible or not "To Top" link

    $(window).scroll(function () {
      $(this).scrollTop() > offset ? $back_to_top.addClass("top-is-visible") : $back_to_top.removeClass("top-is-visible top-fade-out");

      if ($(this).scrollTop() > offset_opacity) {
        $back_to_top.addClass("top-fade-out");
      }
    }); //Smoothy scroll to top
    //$back_to_top.css('background-image','../images/to-top.svg');

    $back_to_top.on("click", function (event) {
      event.preventDefault();
      $("body,html").animate({
        scrollTop: 0
      }, scroll_top_duration);
    });
  }); //Another class added with a shorter scroll

  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $('body').addClass('scrolled');
    } else {
      $('body').removeClass('scrolled');
    }
  });
  $('.sidebar .widget_nav_menu .widget-wrap').each(function () {
    if (!($(this).find('h3').length > 0)) {
      $('<h3 class="widgettitle widget-title">Section Menu</h3>').prependTo(this);
    }
  });
  /*****************Fix OEmbed issues that OCM makes frequently****************/

  var bodyHasFirstParagraphTrue = document.body.classList.contains('first-paragraph-true');
  var entryContent = document.querySelector(".entry-content");
  $('.entry-content:has(iframe) p:first-child').addClass('first-child');
  $('.entry-content p:has(iframe)').parent().addClass('first-has-iframe');
  /****B/C Safari won't play nice with the Apply Now transitions, we're going to add the browser as a body class****/

  var BrowserDetect = {
    init: function init() {
      this.browser = this.searchString(this.dataBrowser) || "Other";
      this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "Unknown";
    },
    searchString: function searchString(data) {
      for (var i = 0; i < data.length; i++) {
        var dataString = data[i].string;
        this.versionSearchString = data[i].subString;

        if (dataString.indexOf(data[i].subString) !== -1) {
          return data[i].identity;
        }
      }
    },
    searchVersion: function searchVersion(dataString) {
      var index = dataString.indexOf(this.versionSearchString);

      if (index === -1) {
        return;
      }

      var rv = dataString.indexOf("rv:");

      if (this.versionSearchString === "Trident" && rv !== -1) {
        return parseFloat(dataString.substring(rv + 3));
      } else {
        return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
      }
    },
    dataBrowser: [{
      string: navigator.userAgent,
      subString: "Edge",
      identity: "MS Edge"
    }, {
      string: navigator.userAgent,
      subString: "MSIE",
      identity: "Explorer"
    }, {
      string: navigator.userAgent,
      subString: "Trident",
      identity: "Explorer"
    }, {
      string: navigator.userAgent,
      subString: "Firefox",
      identity: "Firefox"
    }, {
      string: navigator.userAgent,
      subString: "Opera",
      identity: "Opera"
    }, {
      string: navigator.userAgent,
      subString: "OPR",
      identity: "OPR"
    }, {
      string: navigator.userAgent,
      subString: "Netscape",
      identity: "Netscape"
    }, {
      string: navigator.userAgent,
      subString: "Chrome",
      identity: "Chrome"
    }, {
      string: navigator.userAgent,
      subString: "Safari",
      identity: "Safari"
    }]
  };
  BrowserDetect.init();
  var bv = BrowserDetect.browser;

  if (bv == "Chrome") {
    $("body").addClass("chrome");
  } else if (bv == "MS Edge") {
    $("body").addClass("edge");
  } else if (bv == "Explorer") {
    $("body").addClass("ie");
  } else if (bv == "Firefox") {
    $("body").addClass("firefox");
  } else if (bv == "Safari") {
    $("body").addClass("safari");
  } else if (bv == "Netscape") {
    $("body").addClass("opera");
  } else {
    $("body").addClass("browser-unknown");
  }
})(jQuery);
/*****************Move any department info block from content into the footer*******/


if (document.querySelector("#department-footer")) {
  var moveThisDiv = document.querySelector("#department-footer");
  var destinationFooter = document.querySelector('.site-footer');
  deptFooter = destinationFooter.prepend(moveThisDiv);
  moveThisDiv.style.visibility = 'visible';
}
/*****************Make sidebar menus reponsive****************/


var bodyHasClass = document.body.classList.contains('sidebar-content');
var sidebarHasMenu = document.querySelector(".navigation_widget");
var hamburgerMenu = document.createElement("i");
hamburgerMenu.className = "fa fa-bars float-right text-xl";

if (bodyHasClass && sidebarHasMenu) {
  document.querySelector(".sidebar .navigation_widget .widget-title").appendChild(hamburgerMenu);
  hamburgerMenu.innerHTML = "&nbsp;";
}

/***/ }),

/***/ "./style.css":
/*!*******************!*\
  !*** ./style.css ***!
  \*******************/
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
/******/ 			"/dist/global": 0,
/******/ 			"dist/style": 0
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
/******/ 		var chunkLoadingGlobal = self["webpackChunkutc"] = self["webpackChunkutc"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["dist/style"], () => (__webpack_require__("./js/global.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["dist/style"], () => (__webpack_require__("./style.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;