<!DOCTYPE html>
<html>

<head>

    <title>Laporan</title>

    <style>

        body{
            font-family: Arial, sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:8px;
        }

        h2{
            text-align:center;
        }

    </style>

</head>

<body onload="window.print()">

    <h2>
        LAPORAN PEMINJAMAN ALAT
    </h2>

    <p>
        Status :
        <b>{{ strtoupper($status ?? 'SEMUA') }}</b>
    </p>

    <table>

        <tr>

            <th>No</th>
            <th>User</th>
            <th>Alat</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Tanggal</th>

        </tr>

        @foreach($data as $p)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $p->user->nama ?? '-' }}
            </td>

            <td>
                {{ $p->alat->nama_alat ?? '-' }}
            </td>

            <td>
                {{ $p->jumlah }}
            </td>

            <td>
                {{ strtoupper($p->status) }}
            </td>

            <td>
                {{ $p->created_at->format('d-m-Y') }}
            </td>

        </tr>

        @endforeach

    </table>

</body>

</html>