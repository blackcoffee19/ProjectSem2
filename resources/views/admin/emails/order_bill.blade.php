<div>
    <p>Receiver name: {{$customer_name}}</p>
    <p>Address: {{$customer_address}}</p>
    <p>Phone: {{$customer_phone}}</p>
    <p>Order method: {{$method}}</p>
    <p>Status: {{$status}}</p>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Product</th>
                <th>Amount</th>
                <th>Per Price</th>
            </tr>
        </thead>
        <tbody>
            @for ($i =0; $i<count($list_pet);$i++)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$list_pet[$i]->Product->product_name}}</td>
                    <td>{{$list_pet[$i]->amount}}</td>
                    <td>{{$list_pet[$i]->Product->per_price}}</td>
                </tr>
            @endfor
        </tbody>
        <tfoot>
            <tr><td></td></tr>
        </tfoot>
    </table>
</div>