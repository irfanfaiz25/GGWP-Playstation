
document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggle_sidebar, nav_sidebar, bodyId, header_sidebar) => {
        const toggle = document.getElementById(toggle_sidebar),
            nav = document.getElementById(nav_sidebar),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(header_sidebar)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show_sidebar')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('toggle_sidebar', 'nav_sidebar', 'bodyId', 'header_sidebar')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
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