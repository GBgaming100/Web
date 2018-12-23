"use strict";

const pageNames = ['home', 'portfolio', 'games', 'about'];
const indexPage = 'home';
let lastPage = '';

$(() => {
  
  let setPage = (name) => {
    turnOffAllPages();
    removeAllFrames();
    $(`#${name}`).show(0);
    $( `a[href$="#${name}"] .button`).addClass('active');
  }
  
  let turnOffAllPages = () => {
    pageNames.forEach((page) => {
      $(`#${page}`).hide(0);
      $( `a[href$="#${page}"] .button`).removeClass('active');
    })
  }
  
  $(window).on('hashchange', function(e){
    const page = window.location.hash.replace('#','').split('-')[0];
    if (lastPage != page){
      lastPage = page;
      setPage(page);
    }
  });

  let startPage = window.location.hash.replace('#','').split('-')[0];
  
  if (startPage.length < 1) startPage = indexPage;
  setPage(startPage);
  
});