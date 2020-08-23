<!DOCTYPE html>
<html>
<head>
	<title>Laporan Transaksi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Code</th>
				<th>Product</th>
				<th>Sold</th>
				<th>Price</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($trxtion as $row)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$row->trxtion_code}}</td>
				<td>{{$row->product->product_name}}</td>
				<td>{{$row->trxtion_sold}}</td>
				<td>{{"Rp. ".number_format($row->trxtion_price * $row->trxtion_sold)}}</td>
				<td>{{date('d-m-Y', strtotime($row->trxtion_date))}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>