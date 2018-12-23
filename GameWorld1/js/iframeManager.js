const setupIframe = (workDiv) => {
  const vieuws = Array.from($(`${workDiv} .iframe`));
  vieuws.forEach(createIframe);
}

const createIframe = (frame) => {
  $(frame).html(`<iframe width="${Math.round($(window).width()*0.40)}" height="600" src="${$(frame).attr('src')}" scrolling="no"></iframe>`);
}


const removeAllFrames = () => {
  const vieuws = Array.from($(`.iframe`));
  vieuws.forEach((frame) => {
    $(frame).html('');
  });
}