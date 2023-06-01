var lastScrollTop = 0;
var delta = 10;


$( document ).ready( function () {
	
	atTop();
	
	$( document ).on( 'click', '.toggleCart', function () {
		$( 'body' ).css( 'overflow', 'hidden' );
		$( "#popOpCart" ).css( "display", "flex" ).show();
	} );
	
	$( document ).on( 'click', '.closePopCart', function () {
		$( 'body' ).css( 'overflow', 'auto' );
		$( '#popOpCart' ).hide();
	} );
	
	
	$( document ).on( 'change', 'input[type=radio][name=shipping-method-choice]', function () {
		if ( this.value == 'pickup' ) {
			updateTotalcart( 0 );
			$( '#homeZipContainer' ).hide();
			$( '#showHideToggle' ).hide();
		} else if ( this.value == 'home' ) {
			$( '#homeZipContainer' ).show();
			$( '#showHideToggle' ).show();
		}
	} );
	
	
	$( document ).on( 'change', '#shipping-address-toggle', function () {
		let isChecked = $( this ).is( ':checked' );
		
		if ( !isChecked ) {
			$( '#leveringsInfoWrap' ).show();
		} else {
			$( '#leveringsInfoWrap' ).hide();
		}
	} );
	
	function bindHalalCateringCheckoutEvents() {
        $(document).on('click', '#beregnPrisBtn', function (e) {
            e.preventDefault();
    
            let zipCode = parseInt($('#billing_postcode').val());
            var quantityWrapper = $('.w-commerce-commercecheckoutorderitemquantitywrapper');
            var totalAmountItems = parseInt($('.w-commerce-commercecartopenlinkcount.cart-quantity').text().trim());
    
            let deliveryPrice = 0;
            let minItemsRequired = 0;
            // Regular expression pattern to match a number between 1000 and 9999
            let pattern = /^(1000|1\d{3}|[2-9]\d{3})$/;
    
            if (zipCode != '' && zipCode != 0 && pattern.test(zipCode)) {
                if (zipCode >= 1000 && zipCode <= 2800) {
                    minItemsRequired = 10;
                    deliveryPrice = 249;
                } else if (zipCode >= 2801 && zipCode <= 4999) {
                    minItemsRequired = 10;
                    deliveryPrice = 299;
                } else if (zipCode >= 5000 && zipCode <= 5999) {
                    minItemsRequired = 50;
                    deliveryPrice = 1199;
                } else if (zipCode >= 6000 && zipCode <= 7999) {
                    minItemsRequired = 50;
                    deliveryPrice = 1299;
                } else if (zipCode >= 8000 && zipCode <= 9999) {
                    minItemsRequired = 100;
                    deliveryPrice = 1799;
                }

                if (totalAmountItems >= minItemsRequired) {
                    console.log('Eligible for delivery');
                    $('.feedbackDelivery').html("Du opfylder kravene til levering.");
                    // updateTotalcart(deliveryPrice);
                } else {
                    console.log('Do not delivery');
                    $('.feedbackDelivery').html("Desværre, vi leverer til valgte postnummer ved minimums bestilling af " + minItemsRequired + " kuverter.");
                }
                
            } else {
                $('.feedbackDelivery').html("Postnummeret må ikke være tomt. Udfyld venligst.");
            }
    
            
        });
    
        $('input[name="billing_leveringsmetode"]').change(function () {
            if ($(this).is(':checked')) {
                $('#billing_postcode').prop('required', true);
                // Additional code for the radio button selection if needed
            }
        });
    }
    
    jQuery(document).ready(function ($) {
        bindHalalCateringCheckoutEvents();
    });
	


	 jQuery(document).ready(function($) {
	  // Update the required property of the billing_postcode input field
	  $('input[name="billing_leveringsmetode"]').change(function() {
		if ($(this).is(':checked')) {
		  $('#billing_postcode').prop('required', true);
		} else {
		  $('#billing_postcode').prop('required', false);
		}
	  });
	});



	
	var today = new Date();
var tomorrow = new Date(today);
tomorrow.setDate(tomorrow.getDate() + 3);
tomorrow.setHours(12, 0, 0, 0);

var $customDatetime = $('#datetimepicker');
$('.feedbackDate').html("Vælg venligst din tid for at kontrollere muligheden.");

$customDatetime.datetimepicker({
  inline: true,
  allowTimes: [
    '12:00', '12:30',
    '13:00', '13:30',
    '14:00', '14:30',
    '15:00', '15:30',
    '16:00', '16:30',
    '17:00', '17:30',
    '18:00', '18:30',
    '19:00'
  ],
  defaultTime: '12:00',
  theme: 'dark',
  defaultDate: tomorrow,
  onChangeDateTime: function(currentDateTime, $input) {
    var selectedDateTime = moment(currentDateTime).format('DD-MM-YYYY HH:mm');
    $customDatetime.val(selectedDateTime);
  }
}).val(moment(tomorrow).format('YYYY-MM-DD HH:mm'));

$(document).on('click', '#testIfPossible', function(e) {
  e.preventDefault();

  let totalAmountItems = $('#totalAmountItems').val();
  let dateTime = $('#datetimepicker').val();

  let selectedMoment = moment(dateTime, 'DD-MM-YYYY HH:mm');
  let currentMoment = moment();
  let hoursDiff = selectedMoment.diff(currentMoment, 'hours');

  console.log('Hours from current time:', hoursDiff);

  let deliverOk = (hoursDiff >= 72) ? 1 : 0;

  if (deliverOk == 1) {
    $('.feedbackDate').html("Du opfylder kravene for levering.");
  } else {
    $('.feedbackDate').html("Desværre, vi skal minimum bruge 72 timer (3 dage) til forberedelse.");
  }
});
	  

	$( document ).on( 'click', '.singleRetWrap', function () {
		$( this ).toggleClass( 'checked' );
		updateTotals();
	} );
	
	$( window ).scroll( function ( event ) {
		hasScrolled();
	} );
	
	updateTotals();
	
	
	
} );

function updateTotalcart( deliveryPrice ) {
	
	let subtotalPrice = parseInt( $( '#subtotalCart' ).val() );
	let totalWithDelivery = subtotalPrice + deliveryPrice;
	
	let formattedNumber = totalWithDelivery.toLocaleString( 'da-DK', {
		minimumFractionDigits: 2,
		maximumFractionDigits: 2
	} );
	
	let formattedDelivery = deliveryPrice.toLocaleString( 'da-DK', {
		minimumFractionDigits: 2,
		maximumFractionDigits: 2
	} );
	
	
	$( '#deliveryPrice' ).text( formattedDelivery );
	$( '#totalPrice' ).text( formattedNumber );
}

function deliveryPrice() {
	
}

function checkDeliveryDate( dateTimeWanted, itemsWanted ) {
	let dateTimeConverted = new Date( dateTimeWanted );
	let currentTime = new Date();
	
	
	let minimumHours = 72;
	
	
	currentTime.setHours( currentTime.getHours() + minimumHours );
	
	if ( dateTimeConverted.getTime() >= currentTime.getTime() ) {
		return 1;
	} else {
		return 0;
	}
}

function updateTotals() {
	
	let originalPrice = parseInt( $( '#originalPrice' ).val() );
	let newPrice = originalPrice;
	
	$( '.singleCategory' ).each( function ( index, element ) {
		
		let includedAmount = parseInt( $( this ).data( 'included-amount' ) );
		let price = parseInt( $( this ).data( 'price' ) );
		
		// Count amount selected dishes
		let selectedAmountDishes = 0;
		var selectedDishes = [];
		
		$( this ).find( '.singleRetWrap.checked' ).each( function ( index2, element2 ) {
			selectedAmountDishes ++;
			
			selectedDishes.push( $( this ).find( '.singleRetTxtBg .main-paragraph' ).text().trim() );
		} );
		
		let missingRetter = includedAmount - selectedAmountDishes;
		
		var addition_item_html = '';
		if ( includedAmount == 0 && selectedAmountDishes > 0 ) {
			addition_item_html = '<span class="successSpan">Du har valgt ' + selectedAmountDishes + ' retter</span>';
		} else if ( includedAmount > selectedAmountDishes ) {
			addition_item_html = '<span class="missingError">Du skal vælge min. ' + missingRetter + ' retter mere</span>';
		} else if ( includedAmount != 0 && selectedAmountDishes > 0 ) {
			addition_item_html = '<span class="successSpan">Du har valgt ' + selectedAmountDishes + ' retter</span>';
		}
		
		$( this ).find( '.antalValgt' ).html( addition_item_html );
		
		let input = $( '#additional_title_id_' + $( this ).attr( 'data-slug' ) );
		if ( selectedAmountDishes > 0 ) {
			let input_title = input.attr( 'data-title' );
			input.val( input_title + selectedDishes.join( ' | ' ) );
		} else {
			input.val( '' );
		}
		
		// If customer chooses more than included
		if ( selectedAmountDishes > includedAmount ) {
			let extraDishes = selectedAmountDishes - includedAmount;
			newPrice += price * extraDishes;
		}
	} );
	
	$( '.theTotalPricePrKuvert' ).text( newPrice );
	$( 'input[name="custom_price"]' ).val( newPrice );
}

function atTop() {
	
	if ( $( window ).scrollTop() <= 100 ) {
		$( 'div.navbar' ).removeClass( 'notAtTop' );
	} else {
		$( 'div.navbar' ).addClass( 'notAtTop' );
	}
}

function hasScrolled() {
	
	var st = $( this ).scrollTop();
	
	if ( st < 0 ) {
		st = 0;
	}
	
	//console.log(st);
	
	if ( Math.abs( lastScrollTop - st ) <= delta ) {
		return;
	}
	
	if ( st > lastScrollTop ) {
		$( 'div.navbar' ).removeClass( 'naDown' ).addClass( 'navUp' );
	} else {
		if ( st + $( window ).height() < $( document ).height() ) {
			$( 'div.navbar' ).removeClass( 'navUp' ).addClass( 'naDown' );
		}
	}
	
	lastScrollTop = st;
	setTimeout( atTop, 10 );
}