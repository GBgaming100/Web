"use strict";

//settings
const nextSlideTimer = 4; //<-- seconds
const slideMovementSpeed = 0.1; 

$(() => {
  
  let showedSlide = 0;
  let intervalAnimation = null;
  let nextSlideInterval = null;
  
  const slidesCount = $(".slides").children().length;
  let slidesWidth = $(".slide").width();
  
  let setSize = () => {
    const width = slidesCount*100;
    slidesWidth = $(".slide").width();
    $('.slides').css('width', `${width}vw`);
    
    goTo(showedSlide);
  }

  let next = () => {
    showedSlide ++;
    if (showedSlide >= slidesCount) showedSlide = 0;
    goTo(showedSlide);
  }  
  
  let prev = () => {
    showedSlide --;
    if (showedSlide < 0) showedSlide = slidesCount-1;
    goTo(showedSlide);
  }
  
  let goTo = (index) => {
    showedSlide = index;
    
    clearInterval(intervalAnimation);
    const moveTo = -(index*slidesWidth);
    
    intervalAnimation = setInterval(() => {
      const thisX = $('.slides').offset().left + ((moveTo-$('.slides').offset().left)*slideMovementSpeed);
      $('.slides').offset({left:  thisX});
      if (Math.abs(moveTo-thisX) < 0.5) clearInterval(intervalAnimation);
    },10);
  }
  
  let clearAutomovement = () => {
    clearInterval(nextSlideInterval);
  }
       
  nextSlideInterval = setInterval(() => {
    next();
  },nextSlideTimer*1000); 
  
  setSize();
  
  $('#slidePrev').click(() => {clearAutomovement(); prev();});
  $('#slideNext').click(() => {clearAutomovement(); next();});
  $('.slideThumbnail').click((e) => {clearAutomovement(); goTo($(e.currentTarget).attr('slideIndex'));});
  $(window).on('resize', setSize);
  

});