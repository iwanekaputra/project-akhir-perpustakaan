<!DOCTYPE html>
<html>
    <head>
<title>Data Transaksi</title>
</head>
<body>
<h3 align="center">Data Transaksi</h3>
<table border="1" align="center" cellpadding="10" cellspacing="0">
                        <thead>
                            <tr bgcolor="grey">
                                <th>No</th>
                                <th>NAMA</th>
                                <th>JUDUL</th>
                                <th>JUMLAH</th>
                                <th>WAKTU PINJAM</th>
                                <th>WAKTU PENGEMBALIAN</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($data as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->buku->judul}}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->tgl_pinjam }}</td>
                                <td>{{ $p->tgl_kembali }}</td>
                                <td>{{ $p->keterangan->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
</body>

</html>