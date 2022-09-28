$('.slider').each(function(){ //for every slider 
  var $this =$(this);//gets the current slider that on screen
  var $group = $this.find('.slide-group');//gets the sliders container
  var $Slideshow = $this.find('.slide'); // holds all the sliders 
  var Array1 = [];
  var currentIndex = 0;
  var timeout; // variable timeout
  
  function move(newIndex){ // used for moving the images to create the slide
    var animateLeft, slideLeft;

    advance(); // call the function once a slide has moved

    if ($group.is(':animated') || currentIndex === newIndex){
      return;
    }

   

    if(newIndex > currentIndex){// if the new slide turns to the current
      slideLeft = '100%';
      animateLeft = '-100%';
    }else{
      slideLeft = '-100%';
      animateLeft = '100%';
    }
//position slide 
    $Slideshow.eq(newIndex).css({left: slideLeft, display: 'block'});
    $group.animate({left: animateLeft} , function(){// animate to next slide 
      $Slideshow.eq(currentIndex).css({display: 'none'});// hide the old slide
      $Slideshow.eq(newIndex).css({left: 0} ); // sets the group and position of all Slideshow
      $group.css({left: 0});
      currentIndex = newIndex;
    });
  }

//entire function will set the time between the Slideshow 
  function advance(){
    clearTimeout(timeout);
    timeout=setTimeout(function(){
      if(currentIndex < ($Slideshow.length - 1)){
        move(currentIndex + 1);

      }else{
        move(0);
      }
    },4000);
  }

  $.each($Slideshow, function(index){
    var $button = $('<button type="button" class="slide-btn">&bull;</button>');
    if (index === currentIndex) {
    $button.addClass('active');
    }
    $button.on('click', function(){
      move(index);
    }).appendTo($this.find('.slide-buttons'));
    Array1.push($button);
  });

  advance();
});