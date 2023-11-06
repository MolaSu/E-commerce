<h1>{{$data['tittle']}}</h1>
<p>Your order ID: {{$data['content']->id}}</p>
<table>
    <tr>
        <th>DATE :</th>
        <td>{{$data['content']->created_at}}</td>
    </tr>
    <tr>
        <th>PHONE :</th>
        <td>{{$data['content']->phone}}</td>
    </tr>
    <tr>
        <th>ADDRESS :</th>
        <td>{{$data['content']->address}},{{$data['content']->ward_name}},{{$data['content']->district_name}},{{$data['content']->province_name}}</td>
    </tr>
</table>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['content']->products as $v)
        <tr>
            <td>{{$v->name}}</td>
            <td>{{$v->price}}</td>
            <td>{{$v->quantity}}</td>
            <td>{{$v->price * $v->quantity}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<style>