jQuery(document).ready(function ($) {
  // FEATURED IMAGE ============================================================================
  $(".acf-field .acf-label")
    .css("vertical-align", "top")
    .css("margin", "0px 0 16px");
  $('[data-name="vert"] > .acf-label').hide();

  $('[data-name="vert"] > .acf-input > .acf-fields > .acf-field').each(
    function () {
      var firstLabel = $(this).find(".acf-label > label").first();
      firstLabel.css("font-weight", "700").css("font-size", 18);

      $(this).css("cursor", "pointer");
      $(this).find(".acf-label label").css("cursor", "pointer");

      const name = $(this).attr("data-name");
      console.log(name, "xx");
      if (name != "number_reviewer") {
        $(this).click(function (e) {
          console.log(e.target);
          var labelText = $(e.target).text();
          var allowedLabels = [
            "Banner",
            "About Us",
            "Venue",
            "Menu",
            "Gallery",
            "Promo",
            "Google Review",
            "Reservation",
          ];

          if (allowedLabels.includes(labelText)) {
            $(this).css({
              height: $(this).css("height") === "50px" ? "auto" : "50px", // Toggle between 50px and auto
              overflow: $(this).css("height") === "50px" ? "visible" : "hidden", // Toggle overflow accordingly
            });
          }
        });
      }
    }
  );
});
