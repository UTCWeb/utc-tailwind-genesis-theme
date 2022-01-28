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
    $hsInput = $hsWrap.find('input[type="search"]');

  // Make sure JS class is added.
  $(document).ready(function () {
    $("body").addClass("js");
  });

  // Run on page scroll.
  $(window).scroll(function () {
    // Toggle header class after threshold point.
    if (50 < $(document).scrollTop()) {
      $(".site-container").addClass("shadow");
    } else {
      $(".site-container").removeClass("shadow");
    }
  });

  // Handler for click a show/hide button.
  $hsToggle.on("click", function (event) {
    event.preventDefault();

    if ($(this).hasClass("close")) {
      hideSearch();
    } else {
      showSearch();
    }
  });

  $(".ab-block-post-grid-excerpt:empty")
    .parent()
    .parent()
    .addClass("no-excerpt");

  // Handler for pressing show/hide button.
  $hsToggle.on("keydown", function (event) {
    // If tabbing from toggle button, and search is hidden, exit early.
    if (9 === event.keyCode && !$header.hasClass("search-visible")) {
      return;
    }

    event.preventDefault();
    handleKeyDown(event);
  });

  // Hide search when tabbing or escaping out of the search bar.
  $hsInput.on("keydown", function (event) {
    // Tab: 9, Esc: 27.
    if (9 === event.keyCode || 27 === event.keyCode) {
      hideSearch(event.target);
    }
  });

  // Hide search on blur, such as when clicking outside it.
  $hsInput.on("blur", hideSearch);

  // Helper function to show the search form.
  function showSearch() {
    $header.addClass("search-visible");
    $hsWrap.slideDown("fast").find('input[type="search"]').focus();
    $hsToggle.attr("aria-expanded", true);
  }

  // Helper function to hide the search form.
  function hideSearch() {
    $hsWrap
      .slideUp("fast")
      .parents(".site-header")
      .removeClass("search-visible");
    $hsToggle.attr("aria-expanded", false);
  }

  // Keydown handler function for toggling search field visibility.
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

  //Apply now ribbon
  const ribbon = document.getElementById("menuribbon");

  ribbon.onmouseover = function (event) {
    let target = event.target;
    while (target !== ribbon) {
      target = target.parentNode;
      target.classList.remove("up");
      target.classList.add("down");
    }
  };

  ribbon.onmouseout = function (event) {
    let target = event.target;
    while (target !== ribbon) {
      target = target.parentNode;
      target.classList.remove("down");
      target.classList.add("up");
    }
  };

  /****add controls to the main menu****/
  $(".genesis-nav-menu .sub-menu a").each(function () {
    $(this).hover().parent();
  });
  $(".genesis-nav-menu.menu-primary").addClass("level-1");
  $(
    ".genesis-nav-menu.menu-primary > li.menu-item-has-children > .sub-menu"
  ).addClass("level-2");

  $(".genesis-nav-menu.menu-primary > li.menu-item-has-children").each(
    function () {
      $(this).click(function () {
        if ($(this).hasClass("clicked")) {
          $(this)
            .find("button")
            .removeClass("activated")
            .attr("aria-expanded", "false")
            .attr("aria-pressed", "false");
          $(this).find(".level-2").hide("fast");
          $(this).removeClass("clicked");
          $(this).addClass("removeclicked");
        } else {
          $(this)
            .parent()
            .find(".clicked")
            .each(function () {
              $(this)
                .find("button")
                .removeClass("activated")
                .attr("aria-expanded", "false")
                .attr("aria-pressed", "false");
              $(this).find(".level-2").hide("fast");
              $(this).removeClass("clicked");
              $(this).addClass("removeclicked");
            });
          $(this)
            .find("button")
            .addClass("activated")
            .attr("aria-expanded", "true")
            .attr("aria-pressed", "true");
          $(this).find(".level-2").show("slow");
          $(this).addClass("clicked");
          $(this).removeClass("removeclicked");
        }
      });
    }
  );

  jQuery(document).ready(function ($) {
    // Scroll (in pixels) after which the "To Top" link is shown
    var offset = 300,
      //Scroll (in pixels) after which the "back to top" link opacity is reduced
      offset_opacity = 1200,
      //Duration of the top scrolling animation (in ms)
      scroll_top_duration = 700,
      //Get the "To Top" link
      $back_to_top = $(".to-top");

    //Visible or not "To Top" link
    $(window).scroll(function () {
      $(this).scrollTop() > offset
        ? $back_to_top.addClass("top-is-visible")
        : $back_to_top.removeClass("top-is-visible top-fade-out");
      if ($(this).scrollTop() > offset_opacity) {
        $back_to_top.addClass("top-fade-out");
      }
    });

    //Smoothy scroll to top
    $back_to_top.on("click", function (event) {
      event.preventDefault();
      $("body,html").animate(
        {
          scrollTop: 0,
        },
        scroll_top_duration
      );
    });
  });
})(jQuery);

if (document.querySelector("#genesis-content .department-footer")) {
  const moveThisFooter = document.querySelector(
    "#genesis-content .department-footer"
  );
  const removeThisFooter = document.querySelector(
    ".department-info .department-footer"
  );
  const destinationDiv = document.getElementById("department-info");
  var fragment = document.createDocumentFragment();
  fragment.appendChild(moveThisFooter);
  destinationDiv.appendChild(fragment);
  removeThisFooter.remove();
}

const dptLink = document.querySelector("#dpt-email .dpt-link");
if (dptLink.innerHTML === "") {
  dptLink.parentNode.remove();
}

var hamburgerMenu = document.createElement("i");
hamburgerMenu.className = "fa fa-bars float-right text-xl";
document
  .querySelector(".sidebar .widget_nav_menu .widget-title")
  .appendChild(hamburgerMenu);
hamburgerMenu.innerHTML = "&nbsp;";
