<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>

    <style>
        body { font-family: Arial; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; }
    </style>

</head>

<body onload="window.print()">

<h3>Laporan Peminjaman & Pengembalian</h3>

<p>
    Periode: {{ $mulai }} - {{ $sampai }}
</p>

<hr>

<h4>Peminjaman</h4>

<table>

<tr>
    <th>User</th>
    <th>Alat</th>
    <th>Status</th>
</tr>

@foreach($peminjaman as $p)
<tr>
    <td>{{ $p->user->nama }}</td>
    <td>{{ $p->alat->nama_alat }}</td>
    <td>{{ $p->status }}</td>
</tr>
@endforeach

</table>

<br>

<h4>Pengembalian</h4>

<table>

<tr>
    <th>User</th>
    <th>Alat</th>
    <th>Denda</th>
</tr>

@foreach($pengembalian as $k)
<tr>
    <td>{{ $k->peminjaman->user->nama }}</td>
    <td>{{ $k->peminjaman->alat->nama_alat }}</td>
    <td>Rp {{ number_format($k->denda) }}</td>
</tr>
@endforeach

</table>

</body>
</html>