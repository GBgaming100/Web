"use strict";


$(() => {
  
  const init = () =>{
    const workLinks = Array.from($('.work'));
    const startIndex = window.location.hash.replace('#','').split('-');
    let start = 0;
    
    workLinks.forEach(prepareWorkLink);
    
    if (startIndex.length > 1) {
      start = startIndex[1];
    }
    
    closeAllWork();
    $(`.work[for=${start}]`).addClass('workSelecter');
    $(`.workContent[work=${start}]`).show();
    initWorkVieuw(`.workContent[work=${start}]`);
    setupIframe(`.workContent[work=${start}]`);
  }
    
  const prepareWorkLink = (link) => {
    $(link).click(openWork);
  }
  
  const openWork = (openLink) => {
    const link = $(openLink.target).parent();
    const index = link.attr('for');
    
    
    removeAllFrames();
    initWorkVieuw(`.workContent[work=${index}]`);
    setupIframe(`.workContent[work=${index}]`);
    
    closeAllWork();
    link.addClass('workSelecter');
    $(`.workContent[work=${index}]`).show();
    
    window.location.hash = window.location.hash.split('-')[0] + '-' + index.toString();
  }
  
  const closeAllWork = () => {
    const workLinks = Array.from($('.work'));
    workLinks.forEach((link) => {
      $(link).removeClass('workSelecter');
    });
    
    const workcontant= Array.from($('.workContent'));
    workcontant.forEach((link) => {
      $(link).hide();
    });
  }
  
  
  $(window).on('hashchange', (e) =>{
    const page = window.location.hash.replace('#','').split('-')[0];
    if (page == "portfolio") init();
  });
  
  init();
  
  
});