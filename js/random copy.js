function randomImage() {
  var fileNames = [
    "./images/photos/image1.webp",
    "./images/photos/image2.webp",
    "./images/photos/image3.webp",
    "./images/photos/image4.webp",
    "./images/photos/image5.webp",
    "./images/photos/image6.webp",
    "./images/photos/image7.webp",
    "./images/photos/image8.webp",
    "./images/photos/image9.webp",
    "./images/photos/image10.webp",   
    "./images/photos/image11.webp",
    "./images/photos/image12.webp",
    "./images/photos/image13.webp",
    "./images/photos/image14.webp",
    "./images/photos/image15.webp",
    "./images/photos/image16.webp",
    "./images/photos/image17.webp",
    "./images/photos/image18.webp",
    "./images/photos/image19.webp",
    "./images/photos/image20.webp",  
  
  ];
  var randomIndex = Math.floor(Math.random() * fileNames.length);
  document.getElementById("randpic").style.content = 'url(' + fileNames[randomIndex] + ')';  
}

function getRandomTime() {
        return 5000;
    // return Math.round(Math.random() * 5000);
}

(function loop() {
    setTimeout(function() {
      randomImage();
    loop();
  }, getRandomTime())
})();