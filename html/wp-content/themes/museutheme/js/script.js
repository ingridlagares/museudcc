
$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('.Homepage_Top_Class').offset().top
    }, 'slow');
});

const imgContent = document.querySelectorAll('.img-content-hover');

function showImgContent(e) {
  for(var i = 0; i < imgContent.length; i++) {
    var mouseY = e.pageY - 1740;
    var mouseX = e.pageX + 20;
    imgContent[i].style.left = mouseX + 'px';
    imgContent[i].style.top = mouseY + 'px';
  }
};

document.addEventListener('mousemove', showImgContent);
