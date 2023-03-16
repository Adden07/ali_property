<table>
    <tr>
        <td>Service: <strong>{{ $order->service_type }}</strong></td>
    </tr>
    <tr>
        <td>Name : {{ @$user->name }}</td>
    </tr>
    <tr>
        <td>Email : {{ $user->email }}</td>
    </tr>
    <tr>
        <td>Contact No : {{ $user->contact_no }}</td>
    </tr>
    <tr>
        <td>Address : {{ $user->address }}</td>
    </tr>
    <tr>
        <td>Location : {{ $order->location }}</td>
    </tr>
    <tr>
        <td>Date : {{ date('d-M-Y', strtotime($order->date)) }}</td>
    </tr>
    <tr>
        <td>Time : {{ $order->past_time }} - {{ $order->future_time }}</td>
    </tr>
    <tr>
        <td>Payment Type : {{ $order->payment_method }}</td>
    </tr>
    <tr>
        <td> Package Type: {{ $order->form_type }}</td>
    </tr>
    @foreach($order_details AS $detail)
        <tr>
            <td>Package Name : {{ $detail->pkg_name }}</td>
        </tr>
        <tr>
            <td>No Of Persons/Hours : {{ $detail->persons }}</td>
        </tr>
        @if($detail->no_of_professional != null)
            <tr>
                <td>No of Professionals : {{ $detail->no_of_professional }}</td>
            </tr>
        @endif
        <tr>
            <td>Package Price : {{ $detail->pkg_price }}</td>
        </tr>
        <tr>
            <td>Discount : {{ $detail->discount }}</td>
        </tr>
        <tr>
            <td>Net Total : {{ $detail->net_total }}</td>
        </tr>
        <tr>
            <td>Total : {{ $detail->total }}</td>
        </tr>
    @endforeach
    <hr>
    <tr></tr>
    <tr>
        <td>Order Net Total : {{ $order->net_total }}</td>
    </tr>
    <tr>
        <td>Order  Total : {{ $order->total }}</td>
    </tr>
</table>