
$(document).ready(function(){

      // Function to handle header scrolling
      function handleHeaderScroll() {
        var scrollPosition = $(window).scrollTop();

        // Add or remove the sticky class based on the scroll position
        if (scrollPosition > 50) {
            $('header').addClass('sticky-header');
        } else {
            $('header').removeClass('sticky-header');
        }
    }

    // Call the function on page load
    handleHeaderScroll();

    // Call the function on scroll
    $(window).on('scroll', function () {
        handleHeaderScroll();
    });

    $('.services-slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow:"<a href='javscript:void(0);' type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></a>",
        nextArrow:"<a href='javscript:void(0);' type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></a>",
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
});

$(document).ready(function () {
  // Function to toggle the mobile menu
  function toggleMobileMenu() {
    $('#navbarmain').slideToggle();
  }

  // Toggle the mobile menu when the burger icon is clicked
  $('.navbar-toggler').on('click', function () {
    $(this).blur();
    setTimeout(function() {
      toggleMobileMenu();
    }, 100); // Ganti angka 100 dengan jumlah milidetik yang sesuai dengan kebutuhan Anda
  });

  // Close the mobile menu when a menu item is clicked
  $('#navbarmain .nav-link').on('click', function () {
    if ($(window).width() < 992) {
      // Check if the Services dropdown menu is open, if yes, do not close the menu
      if (!$(this).hasClass('dropdown-toggle')) {
        toggleMobileMenu();
      }
    }
  });

  // Handle window resize to show/hide the mobile menu
  $(window).on('resize', function () {
    if ($(window).width() >= 992) {
      $('#navbarmain').show();
    } else {
      $('#navbarmain').hide();
    }
  });
});


