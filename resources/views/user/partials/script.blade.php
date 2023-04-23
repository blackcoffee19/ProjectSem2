<script>
    $(document).ready(function(){
        $('#clearCart').click(function(){
          console.log(window.location.origin + "/index.php/ajax/cart/clearcart");
            $.get(window.location.origin + "/index.php/ajax/cart/clearcart",function(data){
                $('#listCart').html(data);
            })
        });
        @if(!Auth::check() || Auth::user()->admin != "2")
        $('.btn_showcart').click(function(){
            // console.log($(this).html());
            $.get(window.location.origin+"/public/index.php/ajax/cart/listcart",function(data){
                $('#listCart').html(data);
                $('input[name=_token]').val($('meta[name="csrf-token"]').attr('content'));
                
            })
        });
        @endif
        @if (Session::has('order_mess'))
          $('#order_message').html("{{Session::get('order_mess')}}");
          let toastorder = new bootstrap.Toast($('#toastOrder'))
          toastorder.show();
        @endif
        
        const valiquan_cart = (value)=>{
            let validateNum =/^\d{1,10}$/;
            let currentVl = $(this).val();
            $(this).val(validateNum.test(currentVl)?currentVl:value);
        }
        $('.btn_modal').click(function(){
            $.get(window.location.origin+"/public/index.php/ajax/modal/show-product/"+$(this).data('product'),function(data){
              let dataProduct = jQuery.parseJSON(data);
              let listImage = "";
              let slider_product = "";
              dataProduct['images'].forEach(img => {
                slider_product += `<div class="zoom slider_item" onmousemove="zoom(event)" style="background-image: url(images/products/${img};object-fit:contain;background-repeat: no-repeat"><image src='images/products/${img}' class='img-fluid'></div>`;
                listImage += "<div class='col-3'><div class='thumbnails-img'><img src='images/products/"+img+"'></div></div>";
              });
              $("#productModal").html(slider_product);
              $('#productModalThumbnails').html(listImage);
              $('#productNameModal').html(dataProduct['name']);
              $('input[name=max_quan]').val(dataProduct['quantity']);
              let strStart ="";
              for(let i =0; i<dataProduct['rating'];i++){
                strStart+="<i class='bi bi-star-fill'></i>"
              }
              for(let j = 0; j < 5-dataProduct['rating'];j++){
                strStart+="<i class='bi bi-star'></i>";
              }
              strStart += `<span class='ms-3 text-muted'>(${dataProduct["sold"]} solds)</span>`;
              $('#modal_Fav').attr("data-bs-idproduct",dataProduct['id_product']);
              if(dataProduct["favourite"]){
                $('#modal_Fav').html("<i class='bi bi-heart-fill text-danger'></i>")
              }else{
                $('#modal_Fav').html("<i class='bi bi-heart'></i>")
              }
              $('#ratingModal').html(strStart);
              $('#soldModal').html(`(${dataProduct["sold"]} sold)`);
              if(parseInt(dataProduct["sale"])>0){
                $('.hasSale').removeClass('d-none');
                $('#priceModal').html(`$${dataProduct["price"]}`);
                $('#saleModal').html(`${dataProduct["sale"]}% Off`);
                $('#priceAFSModal').html(`$${(parseInt(dataProduct["price"])*(1-dataProduct["sale"]/100)).toFixed(2)}`)
              }else{
                $('.hasSale').addClass('d-none');
                $('#priceAFSModal').html(`$${dataProduct["price"]}`);
              };
              $('#weigthModal').html("100g");
              $('#quantityModal').html(Math.floor(dataProduct["quantity"]));
              $('#idModal').html(dataProduct['id_product']);
              $('input[name=id_pro]').val(dataProduct['id_product']);
              $('.typeModal').html(dataProduct['type']);
              let slider = tns({
                  container: '.slider_modalproduct',
                  items: 1,
                  speed: 500,
                  autoplay: true,
                  axis: "horizontal",
                  autoplayButtonOutput:0,
                  controls: 0,
                  navContainer: '.slider_modalnav',
                  navAsThumbnails:true
              })
            });
        });
        $('.compare_product').click(function(){
          if($('#btn-compare').hasClass('d-none')){
            $('#btn-compare').removeClass('d-none');
          }
          $.get(window.location.origin+"/public/index.php/ajax/add-compare/"+$(this).data('bsProduct'),function(data){
            $('#messCompare').html(data);  
          })
          const toast = new bootstrap.Toast($('#toastCompare'))
          toast.show();
        });
        $('#show_compare').click(function(){
          $.get(window.location.origin+"/public/index.php/ajax/compare/showcompare",function(data){
            $('#compare_detail').html(data);  
          })
        });
        $('.addFav').click(function(){
            $(this).children().toggleClass('bi-heart').toggleClass('bi-heart-fill text-danger');
          $.get(window.location.origin+'/public/index.php/ajax/add-favourite/'+$(this).data('bsIdproduct'),function(data){
            $('.countFav').html(data);
          })
        });
        $('.addToCart').click(function(){
          @if(!Auth::check() || Auth::user()->admin != '2')
          const toast = new bootstrap.Toast($('#toastAdd'))
          toast.show();
          @else
          let toastorder = new bootstrap.Toast($('#toastWarning'))
          toastorder.show();
          @endif
          $.get(window.location.origin+"/public/index.php/ajax/add-cart/"+$(this).data('bsId'),function(data){
            $('.countCart').html(data);
          });
        });
        $('#btn_minus').click(function(e){
            e.preventDefault();
            let current = parseInt($('input[name=quan]').val());
            if(current >1){
              current--;
              $('input[name=quan]').val(current);
            }
        });
        $('#btn_plus').click(function(e){
            e.preventDefault();
            let max = parseInt($('#quantityModal').text());
            let current = parseInt($('input[name=quan]').val());
            console.log(current );
            if(max>current){
              current++;
              $('input[name=quan]').val(current);
            }
        });
        $('input[name=quan]').on('focusout',function(e){
            e.preventDefault();
            let validateNum =/^\d{1,10}$/;
            let currentVl = $(this).val();
            $(this).val(validateNum.test(currentVl)?currentVl:100);
        });
        $('input[name=cart_quant]').on('focusout',function(e){
            e.preventDefault();
            let validateNum =/^\d{1,10}$/;
            let currentVl = $(this).val();
            $(this).val(validateNum.test(currentVl)?currentVl:100);
        });
        $('#modal_password, #modal_email').change(function(){
          if($('#modal_password').val().length>0 && $('#modal_email').val().length>0){
              $('#modal_signin').removeAttr('disabled');
          }else{
              $('#modal_signin').attr('disabled','disabled');
          }
        })
        $('.remove_add').click(function(){
          $.get(window.location.origin+"/public/index.php/ajax/remove_address/"+$(this).data('idadd'),function(data){
            $("#listAddress").html(data);
          });
        })
        const host = "https://vapi.vnappmob.com";
        const getProvince = host+"/api/province/";
        $.getJSON(getProvince,function(data){
            $('#province').append("<option selected>--Choose 1 province--</option>");
            $.each(data.results,function(key,value){
                $('#province').append(`<option value='${value.province_id}'>${value.province_name}</option>`);
            });
        });
        $('#province').change(function async(e){
            e.preventDefault();
            if($(this).val() != 79){
              $('#shipment_fee').val(3);
              @if (!Auth::check())
              $('#extra_ship').removeClass('d-none');
              let totall = parseFloat($("#total").data('total'))+1;
              $('#total').html("$"+totall);
              @endif
            }else{
              @if (!Auth::check())
              if(!$('#extra_ship').hasClass('d-none')){
                $('#extra_ship').addClass('d-none');
              }
              $('#total').html('$'+$("#total").data('total'))
              @endif
              $('#shipment_fee').val(2);
            }
            let getDistric = host+"/api/province/district/"+$(this).val();
            $('#district').removeAttr('disabled');
            let str = "<option selected>--Choose 1 district--</option>";
            $.getJSON(getDistric,function(data){
                $.each(data.results,function(key,value){
                    str+=`<option value=${value.district_id}>${value.district_name}</option>`;
                })
                $('#district').html(str);
            });
        });
        $('#district').change(function(e){
            e.preventDefault();
            $('#ward').removeAttr('disabled');
            $('#province option:selected').val($('#province option:selected').text());
            let str = '<option selected>--Choose 1 ward--</option>';
            let getWard = host+"/api/province/ward/"+$(this).val();
            $.getJSON(getWard,function(data){
                $.each(data.results,function(key,value){
                    str+=`<option value=${value.ward_id}>${value.ward_name}</option>`;
                });
                $('#ward').html(str);
            });
        });
        $('#ward').change(function(e){
            e.preventDefault();
            $('#district option:selected').val($('#district option:selected').text());
            $('#ward option:selected').val($('#ward option:selected').text());
            if($('input[name="nameReciever"]').val().trim().length > 0 && $('input[name="emailReciever"]').val().trim().length >0 && $('input[name="phoneReciever"]').val().trim().length>0 && $('#ward').val()){
                  $('#submit_order').removeAttr('disabled');
            }else{
                $("#submit_order").attr('disabled','disabled');
            };
        })
        let valPass = /^(?=.*\d)(?=.*[a-z]).{8,}$/;
        let valiPhone = /^[0-9]{9,11}$/;
        let valiEmail = /^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$/;
        $('input[name=phoneReciever]').focusout(function(e){
            e.preventDefault();
            if(!valiPhone.test($(this).val())){
                $('#valiPhone').text("Invail Phone. Try again");
                $('#next').attr('disabled','disabled');      
                $(this).addClass('is-invalid');
            }else{
                $(this).removeClass('is-invalid');
                $('#valiPhone').text('');
            }
        });
        $("input[name='nameReciever']").focusout(function(e){
            e.preventDefault();
            if($(this).val().trim().length==0){
                $('#valiName').text("Please add name for order");
                $('#next').attr('disabled','disabled');      
                $(this).addClass('is-invalid');
            }else{
                $(this).removeClass('is-invalid');
                $('#valiName').text('');
            }
        });
        $('input[name=emailReciever]').focusout(function(e){
            e.preventDefault();
            if(!valiEmail.test($(this).val())){
                $('#valiEmail').text("Invaild Email. Try again");
                $('#next').attr('disabled','disabled');
                $(this).addClass('is-invalid');      
            }else{
                $(this).removeClass('is-invalid');
                $('#valiEmail').text('');
            };
        });
        $('input[name="nameReciever"],input[name="phoneReciever"],input[name="emailReciever"]').on('blur', function(e) {
            e.preventDefault();
            if($('input[name="nameReciever"]').val().trim().length > 0 && $('input[name="emailReciever"]').val().trim().length >0 && $('input[name="phoneReciever"]').val().trim().length>0 ){
                $("#sendAddress").removeAttr('disabled');
                console.log($('#ward').val());
                if($('#ward').val()){
                  $('#submit_order').removeAttr('disabled');
                }
            }else{
                $("#sendAddress").attr('disabled','disabled');
                $("#submit_order").attr('disabled','disabled');
            };
        });
        $('input[name=register_email]').change(function(){
          if(!valiEmail.test($(this).val())){
            $('#register_email').text("Invaild Email. Try again");
            $('#register_submit').attr('disabled','disabled');
            if($(this).hasClass('is-valid')){
              $(this).removeClass('is-valid');
            }
            $(this).addClass('is-invalid');      
          }else{
            $.get(window.location.origin + '/public/index.php/ajax/check-email/'+$(this).val(), function(data){
              if(data == "existed"){
                $('input[name=register_email]').addClass('is-invalid');
                $('#register_email').text('This email has signed. Choose another one or signin');
              }else{
                if($('input[name=register_email]').hasClass('is-invalid')){
                  $('input[name=register_email]').removeClass('is-invalid');
                }
                $('input[name=register_email]').addClass('is-valid');
                $('#register_email').text('');
              }
            });
          };
        });
        $('input[name=register_phone]').change(function(){
          if(!valiPhone.test($(this).val())){
                $('#register_phone').text("Invaild Phone. Try again");
                $('#register_submit').attr('disabled','disabled');
                if($(this).hasClass('is-valid')){
                  $(this).removeClass('is-valid');
                }
                $(this).addClass('is-invalid');      
            }else{
                if($(this).hasClass("is-invalid")){
                  $(this).removeClass('is-invalid');
                }
                $(this).addClass('is-valid');
                $('#register_phone').text('');
            };
        });
        $('input[name=register_password]').change(function(){
          if(!valPass.test($(this).val())){
                $('#register_password').text("Password is invalid. >= 8 characters, at least 1 normal, at least 1 number)");
                $('#register_submit').attr('disabled','disabled');
            }else{
                $('#register_password').text('');
            };
        });
        $('input[name=register_name], input[name=register_phone], input[name=register_email], input[name=register_password], input[name=accepted]').change(function(){
          if($('input[name=register_name]').val().length >0 && $('input[name=register_phone]').val().length >0 && $('input[name=register_email]').val().length> 0 && $('input[name=register_password]').val().length > 0 && $('#accepted').is(':checked')){
            $('#register_submit').removeAttr('disabled');
          }else{
            $('#register_submit').attr('disabled','disabled');
          }
        });
        $('.check_order').click(function(){
          $.get(window.location.origin+"/public/index.php/manager/ajax/check-order/"+$(this).data('order'),function(data){
            let dataJson = jQuery.parseJSON(data);
            $('input[name=id_order]').val(dataJson['id_order']);
            $("#receiver").html(dataJson['receiver']);
            $("#address").html(dataJson['address']);
            $('#instruction').html(dataJson['instruction']);
            $("#phone").html(dataJson['phone']);
            $('#email_order').html(dataJson['email']);
            $("#payment_method").html(dataJson['method']);
            if(dataJson['coupon']){
              $("#coupon_title").html(dataJson['coupon_title']);
              if(dataJson['discount'] >=10){
                $('#discount').html("- "+dataJson['discount']+"%");
              }else{
                $('#discount').html("- $"+dataJson['discount']);
              }
            }
            let list ="";
            let total = 0;
              for (let i = 0; i < dataJson['cart'].length; i++) {
                list+=`<tr><td>${i+1}</td><td><img class='icon-shape icon-xl' src='images/products/${dataJson['image'][i]}'></td><td>${dataJson['product'][i]}</td><td>${dataJson['cart'][i]['price']}</td><td>${Math.floor(dataJson['cart'][i]['sale'])}%</td><td>${dataJson["cart"][i]['amount']}g</td></tr>`;
                total+=parseFloat(dataJson['cart'][i]['sale']) >0 ?(parseFloat(dataJson['cart'][i]['price'])*(1- parseFloat(dataJson['cart'][i]['sale'])/100))*(dataJson['cart'][i]['amount']/1000):parseFloat(dataJson['cart'][i]['price'])*(parseFloat(dataJson['cart'][i]['amount'])/1000);
              };
            $('#listCart').html(list);
            $('#shipment_fee_modal').html("$"+dataJson['shipping_fee']);
            total+=parseFloat(dataJson['shipping_fee']);
            if(parseInt(dataJson['discount']) <10){
                total-= parseFloat(dataJson['discount']);
              }else{
                total *=(1- parseFloat(dataJson['discount'])/100);
              }
            $('#total_order').html("$"+total.toFixed(2));
            $("#status_order option[value="+dataJson['status']+"]").attr("selected", true);
            $('#order_token').val($('meta[name="csrf-token"]').attr('content'));
            $('#status_order').change(function(){
              $('#save_order').removeAttr('disabled');
            })
          })
        })
    })  
</script>