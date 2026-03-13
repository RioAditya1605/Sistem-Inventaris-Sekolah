<h2 style="text-align:center;">Laporan Barang Masuk</h2>

<table border="1" width="100%" cellspacing="0" cellpadding="5">
<thead>
<tr>
<th>No</th>
<th>Kode</th>
<th>Nama</th>
<th>Tanggal Masuk</th>
<th>Kondisi</th>
<th>Jumlah</th>
<th>Lokasi</th>
</tr>
</thead>

<tbody>
@foreach ($inventaris as $item)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $item->kode }}</td>
<td>{{ $item->nama }}</td>
<td>{{ $item->tanggal_masuk }}</td>
<td>{{ $item->kondisi }}</td>
<td>{{ $item->jumlah }}</td>
<td>{{ $item->lokasi }}</td>
</tr>
@endforeach
</tbody>
</table>