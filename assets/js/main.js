jQuery(document).ready(function ($) {
  // setTimeout(() => {
  //   AOS.init({
  //     once: true,
  //     duration: 1500,
  //   });
  // }, 100);

  // Scroll To Top
  $(".scroll-to-top, .scroll-to-top-sidebar").on("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth", // Smooth scrolling
    });
  });

  // Show/hide the scroll-to-top button based on scroll position
  $('#navigation a').on('click', function (e) {
    e.preventDefault();
    
    let href = $(this).attr('href');
    let targetId;

    if (href.includes('#')) {
      targetId = href.split('#')[1];
    }

    if (targetId && $('#' + targetId).length) {
      $('html, body').animate({
        scrollTop: $('#' + targetId).offset().top
      }, 600); 
    }
  });

  /*
   * Replace all data-background
   */
  (function () {
    var element = document.body.querySelectorAll("[data-background]");
    for (var i in element)
      if (element.hasOwnProperty(i)) {
        let img = element[i].getAttribute("data-background");
        element[i].style.backgroundImage = `url(${img})`;
      }
  })();

  /*
   * Replace all SVG images with inline SVG
   */
  $("img.svg").each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr("id");
    var imgClass = $img.attr("class");
    var imgURL = $img.attr("src");

    jQuery.get(
      imgURL,
      function (data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find("svg");

        // Add replaced image's ID to the new SVG
        if (typeof imgID !== "undefined") {
          $svg = $svg.attr("id", imgID);
        }
        // Add replaced image's classes to the new SVG
        if (typeof imgClass !== "undefined") {
          $svg = $svg.attr("class", imgClass + " replaced-svg");
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr("xmlns:a");

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
        if (
          !$svg.attr("viewBox") &&
          $svg.attr("height") &&
          $svg.attr("width")
        ) {
          $svg.attr(
            "viewBox",
            "0 0 " + $svg.attr("height") + " " + $svg.attr("width")
          );
        }

        // Replace image with new SVG
        $img.replaceWith($svg);
      },
      "xml"
    );
  });

  // NAVIGATION
  /*
   * Burger
   */

  $(".nav-icon3, .state-nav-mobile-close, .state-nav-toscroll li a").click(
    function () {
      $(".state-nav-mobile").toggleClass("active");
      $("body").toggleClass("active-mobile-nav");
      $(".backdrop-overlay").addClass("is-clickable-to-close");
      resetNavState();
    }
  );

  $(".state-close, .state-modal").on("click", function (e) {
    console.log();
    if (!$(e.target).is("img")) {
      $("body").removeClass("active-modal");
      $(".backdrop-overlay").removeClass("is-clickable-to-close");
    }
  });

  $(".backdrop-overlay").on("click", function (e) {
    const isCloseable = $(this).hasClass("is-clickable-to-close");
    if (isCloseable) {
      $("body").removeClass("active-mobile-nav").removeClass("active-modal");
      $(".state-nav-mobile").removeClass("active");
      $(".backdrop-overlay").removeClass("is-clickable-to-close");
    }
  });

  // TAB ===================================================
  // =======================================================
  $(".tab-navs").on("click", "li.tab-li", function (e) {
    e.preventDefault();

    var id = $(this).find("a").attr("href").replace("#", "");
    var currentActive = $(".tab-navs").find(".active");
    var currentID = currentActive.find("a").attr("href").replace("#", "");

    currentActive.removeClass("active");
    $(".tab-content").hide();
    $(this).addClass("active");

    if (window.innerWidth > 768) {
      $("#tabload").show();
    } else {
      $("#tabload-m").show();
    }

    setTimeout(() => {
      if (window.innerWidth > 768) {
        $("#tabload").hide();
      } else {
        $("#tabload-m").hide();
      }

      $(`#${id}`).fadeIn(200);
      // $(".js-menu-" + id).slick("slickGoTo", 0);
      // $(".js-menu-" + id)[0].slick.refresh();
    }, 200);
    //}
  });

  // SCROLL NEAR =========================================
  // ===============================================
  // PROJECT =============================================
  $('.projarr-left').on('click', function () {
    scrollToNearest('.state-project-init','left');
  });
  $('.projarr-right').on('click', function () {
    scrollToNearest('.state-project-init', 'right');
  });
  $(".state-project-btn, .state-project-close").on("click", function (e) {
    e.preventDefault();
    const isSelfClick = $(this).closest('.state-scroll-item').hasClass('active');
    const isMobile = $(e.target).closest('.state-project-desc-overlay').length

    if (!isMobile) {
      !isSelfClick && $('.state-scroll-item').removeClass('active');
      $(this).closest('.state-scroll-item').toggleClass('active');
    } else {
      $('.state-scroll-item').removeClass('active');
    }
    
  }); 

  // BOARD
  $('.board-arrow-left').on('click', function () {
    scrollToNearest('.state-board-init','left', 10, (272 + 60));
  });
  $('.board-arrow-right').on('click', function () {
    scrollToNearest('.state-board-init','right', 10, 272);
  });

  function scrollToNearest(containerSelector, direction, leftSpace = 20, leftContainer = 0) {
    console.log('scrollToNearest')
    const $scrollContainer = $(containerSelector);
    const currentScroll = $scrollContainer.scrollLeft();
    const projects = $scrollContainer.find('.state-scroll-item');
    let targetScroll = currentScroll;
     console.log(targetScroll, 'targetScroll awal')

    if (direction === 'left') {
      // Find the closest project to the left
      projects.each(function () {
        const $project = $(this);
        const projectLeft = $project.position().left + currentScroll - leftContainer;

       
        if (projectLeft < currentScroll) {
          targetScroll = projectLeft - leftSpace;
        }
         //console.log(projectLeft, currentScroll, 'xx')
      });
    } else if (direction === 'right') {
      // Find the closest project to the right
      let found = false;
      projects.each(function () {
        const $project = $(this);
        const projectLeft = $project.position().left + currentScroll - leftContainer;

        console.log(projectLeft, 'projectLeft')

        // Scroll to the next project that is fully visible
        if (projectLeft > (currentScroll+leftSpace) && !found) {

          targetScroll = projectLeft - leftSpace;
          found = true; // Stop at the first matching project
        }
      });
    }

    

    // Ensure targetScroll is not negative
    targetScroll = Math.max(0, targetScroll);

    // Animate the scroll to the target position
    console.log(targetScroll, 'scoll')
    // > 360 ? targetScroll : 0
    $scrollContainer.animate(
      {
        scrollLeft: targetScroll,
      },
      300 // Animation duration
    );
  }

  
  // COPY =========================================
  // ===============================================
  $(".copyUrlButton").on("click", function (e) {
    e.preventDefault();

    // Create a temporary input element
    var tempInput = document.createElement("input");
    tempInput.style = "position: absolute; left: -1000px; top: -1000px";
    document.body.appendChild(tempInput);

    // Set the value of the input to the current page URL
    tempInput.value = window.location.href;

    // Select the input field
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the URL to the clipboard
    document.execCommand("copy");

    // Remove the temporary input
    document.body.removeChild(tempInput);

    // Provide feedback to the user
    $(".js-copied").fadeIn().delay(1000).fadeOut();
  });

  // SLICK =========================================
  // ===============================================
  $(".voila-slider-init").css("display", "block");

  /* HERO SLIDER */
  $(".js-heroslider").slick({
    dots: true,
    infinite: true,
    speed: 300,
    arrows: true,
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    fade: true,
    touchThreshold: 30,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows: false,
        },
      },
    ],
  });

  /* CLIENT */
  const js_client = {
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0,
    touchThreshold: 30,
    pauseOnHover: false,
    pauseOnFocus: false,
    centerMode: true,
    arrows: false,        // Hide navigation arrows
    dots: false,          // Disable dots navigation
    draggable: false,     // Prevent dragging with the mouse
    swipe: false,         // Disable swipe gestures on touch devices
    touchMove: false, 
    cssEase: 'linear', 
    speed: 10000, 
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      },
    ],    // Disable touch move
  };
  $(".js-client").slick(js_client);
  $(".js-client-reverse").slick({
    ...js_client,
    rtl: true,
  });

  /* Project */
  $(".js-project").slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    touchThreshold: 30,
    arrows: true,        // Hide navigation arrows
    dots: false,          // Disable dots navigation
    prevArrow: $('.projarr-left'),
    nextArrow: $('.projarr-right'),
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
});

// CLASS ============================================================
// ==================================================================
class SmoothScroll {
  constructor({ scrollEase = 0.1 }) {
    this.scrollEase = scrollEase;
    this.currentScroll = 0;
    this.targetScroll = 0;
    this.body = document.body;
    this.init();
  }

  init() {
    this.body.style.height = `${this.body.scrollHeight}px`;
    window.addEventListener("scroll", () => this.onScroll());
    this.smoothScroll();
  }

  onScroll() {
    this.targetScroll = window.scrollY || document.documentElement.scrollTop;
  }

  smoothScroll() {
    const diff = this.targetScroll - this.currentScroll;

    if (Math.abs(diff) > 0.1) {
      this.currentScroll += diff * this.scrollEase;
      this.body.style.transform = `translateY(-${this.currentScroll}px)`;
    } else {
      this.currentScroll = this.targetScroll; // Snap to the target if close enough
    }

    requestAnimationFrame(() => this.smoothScroll());
  }
}
