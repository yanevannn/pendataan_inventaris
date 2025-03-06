<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Inventaris</h2>
        <a href="{{ route('inventaris.create') }}" class="btn btn-primary mb-3">Tambah Inventaris</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table id="inventarisTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($inventaris as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>
                        @if ($item->status == 'baik')
                            <span class="badge text-bg-success">Baik</span>
                        @else
                            <span class="badge text-bg-danger">Rusak</span>
                        @endif
                    </td>
                    <td>{{ $item->jumlah }}</td>
                    <td>
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" height="50"
                                alt="Foto {{ $item->nama_barang }}">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('inventaris.edit', $item->id) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                    </tbody>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#inventarisTable').DataTable({});
        });
    </script>
</body>

</html>