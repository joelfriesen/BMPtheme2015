jQuery(function ($) {
  jQuery(".rslides").responsiveSlides({

        speed: +sliderOptions.speed,
        timeout: +sliderOptions.timeout,
        random: +sliderOptions.random,
        nav: +sliderOptions.nav,
        pager: +sliderOptions.pager,

    auto: true,             // Boolean: Animate automatically, true or false
    pause: false,           // Boolean: Pause on hover, true or false
    pauseControls: true,    // Boolean: Pause when hovering controls, true or false
    prevText: "Previous",   // String: Text for the "previous" button
    nextText: "Next",       // String: Text for the "next" button
    maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
    navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
    manualControls: "",     // Selector: Declare custom pager navigation
    namespace: "rslides",   // String: Change the default namespace used
    before: function(){},   // Function: Before callback
    after: function(){}     // Function: After callback
  });     
});