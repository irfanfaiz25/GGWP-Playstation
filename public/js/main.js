const $button  = document.querySelector('#sidebar-toggle');
const $wrapper = document.querySelector('#wrapper');

$button.addEventListener('click', (e) => {
  e.preventDefault();
  $wrapper.classList.toggle('toggled');
});

// page loader
$(window).on("load",function(){
  $(".loader-wrapper").fadeOut("slow");
});

$(document).ready(function () {
    $('#hargaExpend').on('input', function () {
        // Remove non-numeric characters from the input
        var inputValue = $(this).val().replace(/\D/g, '');

        // Format the number with commas (or your preferred formatting)
        var formattedValue = formatNumberWithCommas(inputValue);

        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });
});

$(document).ready(function () {
    $('#dibayar').on('input', function () {
        // Remove non-numeric characters from the input
        var inputValue = $(this).val().replace(/\D/g, '');

        // Format the number with commas (or your preferred formatting)
        var formattedValue = formatNumberWithCommas(inputValue);

        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });
});

$(document).ready(function () {
    $('#total-bayar').on('input', function () {
        // Remove non-numeric characters from the input
        var inputValue = $(this).val().replace(/\D/g, '');

        // Format the number with commas (or your preferred formatting)
        var formattedValue = formatNumberWithCommas(inputValue);

        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });
});

$(document).ready(function () {
    $('#total_rent').on('input', function () {
        // Remove non-numeric characters from the input
        var inputValue = $(this).val().replace(/\D/g, '');

        // Format the number with commas (or your preferred formatting)
        var formattedValue = formatNumberWithCommas(inputValue);

        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });
});

$(document).ready(function () {
    $('#total_tambahan').on('input', function () {
        // Remove non-numeric characters from the input
        var inputValue = $(this).val().replace(/\D/g, '');

        // Format the number with commas (or your preferred formatting)
        var formattedValue = formatNumberWithCommas(inputValue);

        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });
});

$(document).ready(function () {
    $('#hargaAngkringan').on('input', function () {
        // Remove non-numeric characters from the input
        var inputValue = $(this).val().replace(/\D/g, '');

        // Format the number with commas (or your preferred formatting)
        var formattedValue = formatNumberWithCommas(inputValue);

        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });
});

$(document).ready(function () {
    $('#hargaExpendAdd').on('input', function () {
        // Remove non-numeric characters from the input
        var inputValue = $(this).val().replace(/\D/g, '');

        // Format the number with commas (or your preferred formatting)
        var formattedValue = formatNumberWithCommas(inputValue);

        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });
});

$(document).ready(function () {
    $('#totalPs').on('input', function () {
        // Remove non-numeric characters from the input
        var inputValue = $(this).val().replace(/\D/g, '');

        // Format the number with commas (or your preferred formatting)
        var formattedValue = formatNumberWithCommas(inputValue);

        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });
});

$(document).ready(function () {
    $('#totalTambahanPs').on('input', function () {
        // Remove non-numeric characters from the input
        var inputValue = $(this).val().replace(/\D/g, '');

        // Format the number with commas (or your preferred formatting)
        var formattedValue = formatNumberWithCommas(inputValue);

        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });
});

// Function to format a number with commas (e.g., 1,000,000)
function formatNumberWithCommas(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

$(document).ready(function() {
    $('.num-in span').click(function () {
        var $input = $(this).parents('.num-block').find('input.in-num');
      if($(this).hasClass('minus')) {
        var count = parseFloat($input.val()) - 1;
        count = count < 1 ? 1 : count;
        if (count < 2) {
          $(this).addClass('dis');
        }
        else {
          $(this).removeClass('dis');
        }
        $input.val(count);
      }
      else {
        var count = parseFloat($input.val()) + 1
        $input.val(count);
        if (count > 1) {
          $(this).parents('.num-block').find(('.minus')).removeClass('dis');
        }
      }
      
      $input.change();
      return false;
    });
    
  });


    $(document).ready(function () {
        // Function to check if the form is empty
        function isFormEmpty() {
            var inputFieldValue = $('#total-bayar').val().trim();
            return inputFieldValue === '';
        }

        // Enable/disable the submit button based on form input
        // Initially, check if the form is empty and set the button state accordingly
        document.getElementById("pay-btn").disabled = isFormEmpty();

        document.getElementById("total-bayar").addEventListener("input", function () {
            // Update the button state whenever there's an input event
            document.getElementById("pay-btn").disabled = isFormEmpty();
        });
    });