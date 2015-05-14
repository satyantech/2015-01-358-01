// JavaScript Document
// range-slider-1.
    var dec = document.querySelector('.js-decimal');
    var initDec = new Powerange(dec, { decimal: false, callback: displayDecimalValue, max: 50, start: 0 });

   /* function displayDecimalValue() {
      document.getElementById('js-display-decimal').innerHTML = dec.value;
    }*/


    /*function setOpacity() {
      document.querySelector('.js-change-opacity').style.opacity = opct.value;
    }*/


	// range-slider-2.
    var changeInput = document.querySelector('.js-check-change');
      var initChangeInput = new Powerange(changeInput, { decimal: false, callback: displayNumValue, max: 15, start: 1  });
/*
    function displayNumValue() {
      document.getElementById('js-display-change').innerHTML = changeInput.value;
    };*/