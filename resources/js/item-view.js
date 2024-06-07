$(document).ready(function(){
    $("#sendOrderButton").click(function(e){
        e.preventDefault();

        $.ajax({
            url: $("#sendOrderForm").attr("action"),
            type: "POST",
            data: $("#sendOrderForm").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // 注文リストの内容をクリアする
                $(".order-item-area").empty();
                $("#orderId").text("");
            },
            error: function(xhr, status, error) {
                alert("An error occurred: " + error);
            }
        });
    });


        $("select").change(function(){
        let quantity = $(this).val();

        let cart_item = $(this).data('cart-item');

        window.location.href = `/cart-item/${cart_item}/update-quantity/${quantity}`;

        });




    function sendOrder() {
        // フォームを送信
        document.getElementById('sendOrderForm').submit();
    }

});
