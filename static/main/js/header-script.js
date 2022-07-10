const header = document.querySelector('header');
let lastscroll = 0;

window.onscroll = (event) =>{
    const currentscroll = window.scrollY;
    //Scrolling down handler.
    if(currentscroll > lastscroll && !header.classList.contains('scroll-down')){
        header.classList.remove('scroll-up');
        header.classList.add('scroll-down');
    }

    //Scrolling up handler
    if(currentscroll < lastscroll && !header.classList.contains('scroll-up')){
        header.classList.remove('scroll-down');
        header.classList.add('scroll-up');
    }
    //We are at the top, make sure there is no class set in header tag
    // This should be at the bottom part 
    if(currentscroll == 0){
        header.classList.remove('scroll-up');
        
        // header.classList.remove('scroll
    }
    //Update the lastscroll
    lastscroll = currentscroll;

} 