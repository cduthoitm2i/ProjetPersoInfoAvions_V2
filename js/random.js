function init(nImages) {
  for (let i = 1; i < nImages; i++) {
      tImages[i] = new Image()
      tImages[i].src = "./images/photos/image" + i + ".webp"
  }
  i = 1
  window.setInterval(changerImage, 2000)
} /// init
/**
*
* @returns {undefined}
*/
function changerImage() {
  photo.src = tImages[i].src
  photo.alt = "Image : " + i + ".webp"
  i++
  if (i === tImages.length) {
      i = 1
  }
} /// changerImage
/*
* MAIN
*/
var photo = document.getElementById("photo")
var i
var tImages = new Array()
window.onload = init(20)