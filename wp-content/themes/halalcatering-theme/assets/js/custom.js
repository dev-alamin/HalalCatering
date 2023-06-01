var $ = jQuery;

(function($) {
    $(document).ready(function() {

      // for update cart
      $('.w-commerce-commercecartcontainerwrapper--cartType-modal .quantity .qty').on('change', function() {
          $(".w-commerce-commercecartcontainerwrapper--cartType-modal button.button.wp-element-button").addClass('active');
      });
      // end for update cart

      $("#varriation_item_counter").on('click',function(e){

        var hovedretitem = $('.hovedret .checked').length;
        var garnitureItem = $('.garniture .checked').length;
        var kartoflerItem = $('.kartofler .checked').length;
        var saucer = $('.saucer .checked').length;
        var salater = $('.salater .checked').length;

        var retter = $('.retter .checked').length
        
        // for first product
        if(hovedretitem > 0 && garnitureItem > 0 && kartoflerItem > 0 && saucer > 0 && salater>2){
          return true;
        }else if(retter > 3){
          return true;
        }else{
          $(".missing-addon-item").addClass("active");
          return false;
        }

       
        
      })

      function preloader() {
        $('.preloader-section').addClass('active')
      }
      
      setTimeout(preloader, 300);

      $('input#billing_leveringsmetode_Levering_til_adresse').on('click', function() {
        if ($(this).is(':checked')) {
          // Replace "target-element" with the selector of the element you want to add the class to
          $('#billing_postcode_field').addClass('show-box');
        }
      });

      $('input#billing_leveringsmetode_Jeg_henter_selv').on('click', function() {
        if ($(this).is(':checked')) {
          // Replace "target-element" with the selector of the element you want to add the class to
          $('#billing_postcode_field').removeClass('show-box');
        }
      });

      // prepand item
        var newElement = $('<h2 class="billing-info">Betalings info</h2>');

        var targetItem = $('#billing_email_field')

        targetItem.prepend( newElement );

        // for shipping item
        var LeveringsInfo = $('<h2 class="billing-info mt-20">Leverings info</h2>');
        var LeveringsInfoSelector = $('#shipping_first_name_field')
        LeveringsInfoSelector.prepend( LeveringsInfo );


        // append element after date
        var infromation_zip = $("#billing_postcode_field");
        infromation_zip.append('<div class="feedbackDelivery"></div><div class="checkDeliveryPrice"> <div id="beregnPrisBtn">Beregn pris</div> </div>');

        // append after date
        var infromation_zip_two = $("p#datetimepicker_field");
        infromation_zip_two.append('<div class="zip_item"><div class="feedbackDate"></div><div class="checkDeliveryPrice"> <div id="testIfPossible">Test hvis muligt</div> </div></div>');


    });


    $('.ticker_slider').jConveyorTicker({reverse_elm: true});;

    var wow = new WOW(
      {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
        // the callback is fired every time an animation is started
        // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
      }
      );
      wow.init();

      $(document).on('scroll', function(){
        
        var theta = $(window).scrollTop() / 50 % Math.PI;
        $('.main-image.position-absolute.about').css({ transform: 'rotate(' + theta + 'rad)' });
      })

  })(jQuery);


  window.addEventListener('scroll', rotateLogo);

    function rotateLogo() {
      const logo = document.querySelector('.main-image.position-absolute.about');

      if( logo ){
        // Get the current scroll position
        const scrollPosition = window.scrollY || window.pageYOffset;

        // Calculate the degree of rotation based on the scroll position
        const rotationDegree = scrollPosition / 10;

        // Apply the rotation to the logo
        logo.style.transform = `translate(0%, 0%) rotate(${rotationDegree}deg)`;
      }
    }


  $(document).ready(function() {

    var containers = $('.container');

    if (containers.length) {
        containers.each(function() {
            var container = $(this);

            // Support small text - copy to fill screen width
            if (container.find('.scrolling-text').outerWidth() < $(window).width()) {
                var windowToScrolltextRatio = Math.round($(window).width() / container.find('.scrolling-text').outerWidth()),
                    scrollTextContent = container.find('.scrolling-text .scrolling-text-content').text(),
                    newScrollText = '';
                for (var i = 0; i < windowToScrolltextRatio; i++) {
                    newScrollText += ' ' + scrollTextContent;
                }
                container.find('.scrolling-text .scrolling-text-content').text(newScrollText);
            }

            // Init variables and config
            var scrollingText = container.find('.scrolling-text'),
                scrollingTextWidth = scrollingText.outerWidth(),
                scrollingTextHeight = scrollingText.outerHeight(true),
                startLetterIndent = parseInt(scrollingText.find('.scrolling-text-content').css('font-size'), 10) / 4.8,
                startLetterIndent = Math.round(startLetterIndent),
                scrollAmountBoundary = Math.abs($(window).width() - scrollingTextWidth),
                transformAmount = 0,
                leftBound = 0,
                rightBound = scrollAmountBoundary,
                transformDirection = container.hasClass('left-to-right') ? -1 : 1,
                transformSpeed = 200;

            // Read transform speed
            if (container.attr('speed')) {
                transformSpeed = container.attr('speed');
            }
        
            // Make scrolling text copy for scrolling infinity
            container.append(scrollingText.clone().addClass('scrolling-text-copy'));
            container.find('.scrolling-text').css({'position': 'absolute', 'left': 0});
            container.css('height', scrollingTextHeight);
        
            var getActiveScrollingText = function(direction) {
                var firstScrollingText = container.find('.scrolling-text:nth-child(1)');
                var secondScrollingText = container.find('.scrolling-text:nth-child(2)');
        
                var firstScrollingTextLeft = parseInt(container.find('.scrolling-text:nth-child(1)').css("left"), 10);
                var secondScrollingTextLeft = parseInt(container.find('.scrolling-text:nth-child(2)').css("left"), 10);
        
                if (direction === 'left') {
                    return firstScrollingTextLeft < secondScrollingTextLeft ? secondScrollingText : firstScrollingText;
                } else if (direction === 'right') {
                    return firstScrollingTextLeft > secondScrollingTextLeft ? secondScrollingText : firstScrollingText;
                }
            }
        
            $(window).on('wheel', function(e) {
                var delta = e.originalEvent.deltaY;
                
                if (delta > 0) {
                    // going down
                    transformAmount += transformSpeed * transformDirection;
                    container.find('.scrolling-text .scrolling-text-content').css('transform', 'skewX(0deg)');
                }
                else {
                    transformAmount -= transformSpeed * transformDirection;
                    container.find('.scrolling-text .scrolling-text-content').css('transform', 'skewX(0deg)');
                }
                setTimeout(function(){
                    container.find('.scrolling-text').css('transform', 'translate3d('+ transformAmount * -1 +'px, 0, 0)');
                }, 10);
                setTimeout(function() {
                    container.find('.scrolling-text .scrolling-text-content').css('transform', 'skewX(0)');
                }, 500)
        
                // Boundaries
                if (transformAmount < leftBound) {
                    var activeText = getActiveScrollingText('left');
                    activeText.css({'left': Math.round(leftBound - scrollingTextWidth - startLetterIndent) + 'px'});
                    leftBound = parseInt(activeText.css("left"), 10);
                    rightBound = leftBound + scrollingTextWidth + scrollAmountBoundary + startLetterIndent;
        
                } else if (transformAmount > rightBound) {
                    var activeText = getActiveScrollingText('right');
                    activeText.css({'left': Math.round(rightBound + scrollingTextWidth - scrollAmountBoundary + startLetterIndent) + 'px'});
                    rightBound += scrollingTextWidth + startLetterIndent;
                    leftBound = rightBound - scrollingTextWidth - scrollAmountBoundary - startLetterIndent;
                }
            });
        })
    }
});

$(function() {
  $('.shop-slider-title').jConveyorTicker({
    reverse_elm: true,
    start_paused:false,
    anim_duration: 150
  });
  

});

// Responsible for zip code input 
// Added by Al Amin

jQuery(function($) {
    var zipInput = $('#billing_postcode');
    var cusotmZipCode = $('#billing_zip');
    
    // $('input[name=billing_leveringsmetode]').on('change', function() {
    //       // Trigger the WooCommerce AJAX update event
    //       $(document.body).trigger('update_checkout');
    // });

        zipInput.on('input', function() {

            var zipCode = zipInput.val();
    
            // Check if the zip code has 4 digits
            if (zipCode.length === 4) {
                // Trigger the WooCommerce AJAX update event
                $(document.body).trigger('update_checkout');
            }
        });

        // cusotmZipCode.on('input', function() {

        //     var zipCode = cusotmZipCode.val();
    
        //     // Check if the zip code has 4 digits
        //     if (zipCode.length === 4) {
        //         // Trigger the WooCommerce AJAX update event
        //         $(document.body).trigger('update_checkout');
        //     }
        // });
 
});












