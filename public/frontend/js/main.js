(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.nav-bar').addClass('sticky-top');
        } else {
            $('.nav-bar').removeClass('sticky-top');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 24,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            992:{
                items:2
            }
        }
    });
    
})(jQuery);

function addToCart(productId, userId, quantity) {
    if (!productId || !userId || !quantity) {
        Swal.fire({
            title: 'Error!',
            text: 'Gagal mengambil data produk',
            icon: 'error'
        });
        return;
    }

    $.ajax({
        url: '/cart/add_to_cart', 
        method: 'POST',
        data: {
            product_id: productId,
            user_id: userId,
            quantity: quantity
        },
        success: function(response) {
            if (response.status === 'success') {
                Swal.fire({
                    title: 'Success!',
                    text: response.message, 
                    icon: 'success'
                });

                $('#cart-count').text(response.cart_count);
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: response.message || 'Gagal menambahkan produk.',
                    icon: 'error'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error("Error response: " + xhr.responseText);
            Swal.fire({
                title: 'Error!',
                text: 'Gagal menambahkan produk.',
                icon: 'error'
            });
        }
    });
}

function updateCartCount() {
    $.ajax({
        url: "/cart/getCartCount", 
        method: "GET",
        dataType: "json",
        success: function(response) {
            $("#cart-count, .cart-count").text(response.count); 
        },
        error: function(xhr, status, error) {
            console.error("Error fetching cart count:", error);
        }
    });
}

setInterval(updateCartCount, 100);

$(document).ready(function() {
    updateCartCount();
});