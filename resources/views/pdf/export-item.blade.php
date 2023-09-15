<!DOCTYPE html>
<html>
<head>
	<title>Data table</title>
	<style>
        .table1 {
    font-family: sans-serif;
    font-size: 8px;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #f2f5f7;
}
 
.table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
}
 
.table1, th, td {
    padding: 8px 20px;
    text-align: center;
}
 
.table1 tr:hover {
    background-color: #f5f5f5;
}
 
.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
    </style>
</head>
<body>
	<h1>Data Item</h1>
	<h4>Design table 1</h4>
	<table class="table1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Usia</th>
		</tr>
        @foreach ($items as $item)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $item->name }}</td>
			<td>{{ $item->item_id }}</td>
			<td>Rp {{ number_format($item->price,0,',','.') }}</td>
		</tr>
        @endforeach
	</table>	
</body>
</html>