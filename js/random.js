function randomImage() {
    var fileNames = [
      "./images/photos/image1.png",
      "./images/photos/image2.png",
      "./images/photos/image3.png",
      "./images/photos/image4.png",
      "./images/photos/image5.png",
      "./images/photos/image6.png",
      "./images/photos/image7.png",
      "./images/photos/image8.png",
      "./images/photos/image9.png",
      "./images/photos/image10.png",   
      "./images/photos/image11.png",
      "./images/photos/image12.png",
      "./images/photos/image13.png",
      "./images/photos/image14.png",
      "./images/photos/image15.png",
      "./images/photos/image16.png",
      "./images/photos/image17.png",
      "./images/photos/image18.png",
      "./images/photos/image19.png",
      "./images/photos/image20.png",  
    
    ];
    var randomIndex = Math.floor(Math.random() * fileNames.length);
    document.getElementById("randpic").style.content = 'url(' + fileNames[randomIndex] + ')';  
  }
  
  function getRandomTime() {
          return 10000;
      // return Math.round(Math.random() * 5000);
  }
  
  (function loop() {
      setTimeout(function() {
        randomImage();
      loop();
    }, getRandomTime())
  })();