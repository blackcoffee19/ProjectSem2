<div>
    <p>Receiver name: {{$customer_name}}</p>
    <p>Address: {{$customer_address}}</p>
    <p>Phone: {{$customer_phone}}</p>
    <p>Instruction: {{$instruction}}</p>
    <p>Order method: {{$method}}</p>
    <p>Shipment fee: ${{$shipment_fee}}</p>
    @if ($coupon != null)
    <p>Coupon: {{$coupon->title}} {{$coupon->discount >=10 ? "-".$coupon->discount."%": "- $".$coupon->discount}}</p>
    @endif
    <p>Status: <span style="color: brown; font-weight: 600">{{$status}}</span> ({{date_format($date,"F j, Y")}})</p>
    <table >
        <thead>
            <tr>
                <th style="width: 50px"></th>
                <th style="width: 160px;">Product</th>
                <th style="width: 100px;">Amount (gram)</th>
                <th style="width: 100px;">Price (kilogram)</th>
                <th style="width: 100px;">Sale</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @for ($i =0; $i<count($cart);$i++)
                <tr>
                    <td style="padding: 0 10px">{{$i+1}}</td>
                    <td style="padding: 0 10px">{{$cart[$i]->Product->name}}</td>
                    <td style="padding: 0 10px">{{$cart[$i]->amount}}</td>
                    <td style="padding: 0 10px">${{$cart[$i]->price}}</td>
                    <td style="padding: 0 10px">{{$cart[$i]->sale}}%</td>
                </tr>
                @php
                    if($cart[$i]->sale> 0){
                        $total += $cart[$i]->price*(1-$cart[$i]->sale/100)*$cart[$i]->amount/1000;
                    }else{
                        $total +=$cart[$i]->price*$cart[$i]->amount/1000;
                    }
                @endphp
            @endfor
            @php
                $total += $shipment_fee;
                if($coupon !=null){
                    $total = $coupon->discount>=10 ? $total*(1-$coupon->discount/100): $total - $coupon->discount;
                }
            @endphp
        </tbody>
        <tfoot>
            <tr style="margin-top: 10px"><td colspan="3">Total</td><td colspan="2" style="color:red; font-weight: 700">${{number_format($total,2,'.', ' ')}}</td></tr>
        </tfoot>
    </table>
</div>