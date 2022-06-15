

    function wrap() {
        $('#carouselLatestMovies').addClass('chide');
        $('#carouselLatestMoviesWrap').removeClass('chide');
    }

    function unwrap(){
        $('#carouselLatestMovies').removeClass('chide');
        $('#carouselLatestMoviesWrap').addClass('chide');
    }

    function addOrderToCart(row,seat,hall) {

        $('#orderCart').append('<p class="text-white-50 mt-3 ps-2">Row: ' + row + ' Seat: ' + seat + ' Sector: '+ hall +'</p>');
        $('.btn'+row+''+seat).css('color',':','red');
    }
