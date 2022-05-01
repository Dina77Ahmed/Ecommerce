$(document).ready(function() {

    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }


    });

    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);

        }


    });
    //   $('.changeQuantity').click(function (e) { 
    //       e.preventDefault();
    //       $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //       var prod_id =$(this).closest('.product_data').find('.prod_id').val();
    //       var qty =$(this).closest('.product_data').find('.qty-input').val();
    //       data={"prod_id" : prod_id,
    //       "prod_qty": qty,}

    //       $.ajax({

    //       method: "POST",
    //       url: "update-cart",
    //           data: "data",

    //           success: function (response) {
    //               alert(response) 

    //           }
    //       });

    //   });

});