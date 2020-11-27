(function ($) {
    
    $(document).ready(function(){
        $('.bxslider').bxSlider();
    });

} )( jQuery );




// making sure page is fully loaded
window.addEventListener('load', (event) => {
    // grab header element 
    const header = document.querySelector('#masthead.site-header');        

    function distance_from_top(scroll) {     
        if (scroll > 300) {
            header.classList.add('fixed-top');
        } else if (scroll < 300) {
            header.classList.remove('fixed-top');
        }
    }

    function distance_from_top_after_refresh() { 
        // .getBoundingClientRect() returns an object 
        const domRect = header.getBoundingClientRect();
        // getting the "top" value from DOMRect object
        const positionY = Math.abs(domRect.top);
        
        if (positionY > 300) {
            header.classList.add('fixed-top');
        } else { 
            header.classList.remove('fixed-top');
        }
    }
    

    // captures event whenever browser window is scrolled
    window.onscroll = () => { 
        const scroll_position = window.scrollY;
        // calling a function to evaluate based on scroll position
        distance_from_top(scroll_position);
    };
    
    // captures the event when a page is refreshed, then
    // calling a function when so
    window.addEventListener('beforeunload', distance_from_top_after_refresh())
});




