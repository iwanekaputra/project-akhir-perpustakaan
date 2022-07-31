<!DOCTYPE html>
<html>
    <head>
<title>Data Buku</title>
</head>
<body>
<h3 align="center">Data Buku</h3>
<table border="1" align="center" cellpadding="10" cellspacing="0">
                        <thead>
                            <tr bgcolor="grey">
                                <th>No</th>
                                <th>JUDUL</th>
                                <th>ISBN</th>
                                <th>STOK</th>
                                <th>PENGARANG</th>
                                <th>PENERBIT</th>
                                <th>KATEGORI</th>
                                <th>RAK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($data as $b)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $b->judul }}</td>
                                <td>{{ $b->isbn}}</td>
                                <td>{{ $b->stok }}</td>
                                <td>{{ $b->pengarang->nama }}</td>
                                <td>{{ $b->penerbit->nama }}</td>
                                <td>{{ $b->kategori->nama }}</td>
                                <td>{{ $b->rak->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
</body>

</html>