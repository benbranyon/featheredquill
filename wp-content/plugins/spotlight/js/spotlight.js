jQuery(document).ready(function(){
    console.log('spotlight start..');
    jQuery("#dontmiss").smoothDivScroll({
        autoScrollingMode: "always",
        autoScrollingDirection: "endlessloopright",
        autoScrollingStep: 1,
        autoScrollingInterval: 50,
	  //autoScrollingMode: "onStart"
    });

    // Logo parade event handlers
  /*  jQuery("#dontmiss").bind("mouseover", function() {
        jQuery(this).smoothDivScroll("stopAutoScrolling");
    }).bind("mouseout", function() {
        jQuery(this).smoothDivScroll("startAutoScrolling");
    });*/
});