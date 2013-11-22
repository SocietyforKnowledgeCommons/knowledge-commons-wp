!function($){
$(function(){
    var sections = {},
         _height  = $(window).height(),
        i        = 0;
    
    // Grab positions of our sections 
    $('.child-page').each(function(){
        sections[this.name] = $(this).offset().top;
    });

    $(document).scroll(function(){
        var $this = $(this),
            pos   = $this.scrollTop();   
        for(i in sections){
            if(sections[i] > pos && sections[i] < pos + _height){
                $('a').removeClass('active');
                $('#nav_' + i).addClass('active');
                break;
            }  
        }
    });
    
    $('#sub-nav a').click(function(){
        $('#sub-nav .active').removeClass('active');
        $(this).addClass('active');
        var section_top = sections[$(this).attr('id').replace("nav_", "")] - 157;
        $("html body").animate({
          scrollTop: section_top
        }, 1000);
    });
})
}(jQuery)