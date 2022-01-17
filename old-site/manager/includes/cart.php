<script type="text/javascript">
    $(document).ready(function(){
        $(".cart-btn").click(function(){
            $("#carttitle").html($(this).attr("title"));
            $("#cartprice").html($(this).attr("attrprice"));

            $(".popup_layer").addClass("popup_show");
            $(".popup_close").addClass("popup_show");
            $(".popup_window").addClass("popup_show");
            $("#res_cart").hide();
            $("#cart-form").show();

        });
        $(".popup_layer, .popup_close").click(function(){
            $(".popup_layer").removeClass("popup_show");
            $(".popup_close").removeClass("popup_show");
            $(".popup_window").removeClass("popup_show");
        });
        $("#cart-form").submit(function(){
            $.post("http://ukrman.ua/cartsend.php", {item: $("#carttitle").html(), price: $("#cartprice").html(), name: $("#cart-form [name=name]").val(), phone: $("#cart-form [name=phone]").val(), comment: $("#cart-form [name=comment]").val()}, function(data){
                $("#res_cart").show();
                $("#cart-form").hide();
                $("#cart-form input[type=text]").val("");
            });
            return false;
        });
    });
</script>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<div class="popup_layer">&nbsp;</div>
<div class="popup_close">X</div>
<div class="popup_window">
    <span>Оформлення замовлення</span>
    <div id="res_cart">Ваше замовлення оформлено.</div>
    <form role="form" id="cart-form">

        <div class="form-group has-feedback">
            <div id="carttitle">Товар</div>
            <div id="cartprice">Цена</div>
            <input type="text" class="form-control" placeholder="ПІП" name="name" required="">
            <input type="text" class="form-control" placeholder="Телефон" name="phone" required="">
            <input type="text" class="form-control" placeholder="Коментар, колір, розмір, кількість" name="comment">

            <i class="fa fa-envelope form-control-feedback"></i>
        </div>

        <input type="submit" value="Відправити" class="btn btn-default" style="display: block; margin: 10px auto;">
    </form>
</div>