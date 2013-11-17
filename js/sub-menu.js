jQuery(function(){
    var sections = {},
         _height  = jQuery(window).height(),
        i        = 0;
    
    // Grab positions of our sections 
    jQuery('.child-page').each(function(){
        sections[this.name] = jQuery(this).offset().top;
    });

    jQuery(".scrollable-content").scroll(function(){
        var jQuerythis = jQuery(".scrollable-content"),
            pos   = jQuerythis.scrollTop();   
        for(i in sections){
            if(sections[i] > pos && sections[i] < pos + _height){
                jQuery('a').removeClass('active');
                jQuery('#nav_' + i).addClass('active');
                break;
            }  
        }
    });
    
    jQuery('#sub-nav a').click(function(){
        jQuery('#sub-nav .active').removeClass('active');
        jQuery(this).addClass('active');
    });
})