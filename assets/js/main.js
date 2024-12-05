jQuery(document).ready(function ($) {
  setTimeout(() => {
    AOS.init({
      once: true,
      duration: 1500,
    });
  }, 100);

  // const scroller = new SmoothScroll({ scrollEase: 0.05 });

  /*
   * Sticky Header
   */
  // var header = document.getElementById("state-header");

  // isSticky();
  // window.onscroll = function () {
  //   isSticky();
  // };

  // function isSticky() {
  //   //if (window.innerWidth < 769) {
  //   if (window.pageYOffset > 10) {
  //     header.classList.add("state-sticky");
  //   } else {
  //     header.classList.remove("state-sticky");
  //   }
  //   //}
  // }

  // Scroll To Top
  $(".scroll-to-top, .scroll-to-top-sidebar").on("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth", // Smooth scrolling
    });
  });

  // Show/hide the scroll-to-top button based on scroll position
  $(window).scroll(function () {
    if ($(this).scrollTop() > 1000) {
      $(".scroll-to-top-sidebar").addClass("active");
    } else {
      $(".scroll-to-top-sidebar").removeClass("active");
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

  // $(".state-nav-toscroll li a").on("click", function (e) {

  // });
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

  function resetNavState() {}

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
    autoplaySpeed: 1000,
    touchThreshold: 30,
    pauseOnHover: false,
    pauseOnFocus: false,
    centerMode: true,
    arrows: false,        // Hide navigation arrows
    dots: false,          // Disable dots navigation
    draggable: false,     // Prevent dragging with the mouse
    swipe: false,         // Disable swipe gestures on touch devices
    touchMove: false, 
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
