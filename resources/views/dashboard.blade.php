@include('include.app')
@include('include.header')
<body>
<h1>Welcome to Dashboard!</h1>
<table class="table">
	<thead>
		<tr>
			<th>Ngo_id</th>
			<th>Ngo name</th>
			<th>Aadhaar card no</th>
			<th>Email</th>
			<th>Mobile number</th>
			<th>Amount</th>
		</tr>
	</thead>
	<tbody>
		@foreach($service as $s)
		<tr>
			<td>{{$s->ngo_id}}</td>
			<td>{{$s->ngo_name}}</td>
			<td>{{$s->Aadhaar_card_no}}</td>
			<td>{{$s->Email}}</td>
			<td>{{$s->Mobile_number}}</td>
			<td>{{$s->Amount}}</td>
		</tr>
		@endforeach
	</tbody>
	
</table>
</body>
</html>