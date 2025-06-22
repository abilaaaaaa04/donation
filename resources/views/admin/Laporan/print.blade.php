<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Donasi</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        h2,
        p {
            text-align: center;
            margin: 0;
        }

        @media print {
            @page {
                margin: 20mm;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <h2>Laporan Pemasukan Donasi</h2>
    <p>Masjid Jami Al-Barokah</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Donatur</th>
                <th>Nama Donasi</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $i => $row)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $row->nama_donatur }}</td>
                    <td>{{ $row->nama_donasi }}</td>
                    <td>Rp {{ number_format($row->jumlah_donasi, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tgl_transaksi)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>
