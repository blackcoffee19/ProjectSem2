<script>
    $(document).ready(function(){
        $(".manager_notificate").click(function(){
            // console.log($(this).data('order'));
            $.get(window.location.origin+"/public/index.php/manager/ajax/check-notificate/"+$(this).data('order'),function(data){
                let dataJson = jQuery.parseJSON(data);
                // console.log(dataJson);
                $('input[name=id_notificate]').val(dataJson['news']);
                $("#receiver2").html(dataJson['receiver']);
                $("#address2").html(dataJson['address']);
                $('#instruction2').html(dataJson['instruction']);
                $("#phone2").html(dataJson['phone']);
                $('#email_order2').html(dataJson['email']);
                $("#payment_method2").html(dataJson['method']);
                if(dataJson['coupon']){
                $("#coupon_title2").html(dataJson['coupon_title']);
                if(dataJson['discount'] <= 100){
                    $('#discount2').html("- "+dataJson['discount']+"%");
                }else{
                    $('#discount2').html("- "+dataJson['discount']+" đ");
                }
                }
                let list ="";
                let total = 0;
                for (let i = 0; i < dataJson['cart'].length; i++) {
                    list+=`<tr><td>${i+1}</td><td><img class='icon-shape icon-xl' src='images/products/${dataJson['image'][i]}'>${dataJson['product'][i]}</td><td>${dataJson['cart'][i]['price']} đ</td><td>${dataJson['cart'][i]['sale']}%</td><td>${dataJson["cart"][i]['amount']}g</td></tr>`;
                    total+=parseInt(dataJson['cart'][i]['sale']) >0 ?(parseInt(dataJson['cart'][i]['price'])*(1- parseInt(dataJson['cart'][i]['sale'])/100))*(parseInt(dataJson['cart'][i]['amount'])/1000):parseInt(dataJson['cart'][i]['price'])*(parseInt(dataJson['cart'][i]['amount'])/1000);
                };
                $('#listCart2').html(list);
                $("#item_subtotal2").html(total+" đ");
                $('#shipment_fee_modal2').html(dataJson['shipping_fee']+" đ");
                if(parseInt(dataJson['discount']) >100){
                total-= parseInt(dataJson['discount']);
                }else{
                total*=(1- parseInt(dataJson['discount'])/100);
                }
                total+=parseInt(dataJson['shipping_fee']);
                $('#total_order2').html(total+" đ");
                $("#status_order2").html(dataJson['status']);
            })
        })
    })
  </script>