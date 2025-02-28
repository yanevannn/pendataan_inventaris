<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Inventaris</h2>
        <a href="{{ route('inventaris.create') }}" class="btn btn-primary mb-3">Tambah Inventaris</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($inventaris as $item)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>
                        <?php 
                            $status = $item->status;
                            do {
                                if ($status == 'baik') {
                                    echo '<span class="badge text-bg-success">Baik</span>';
                                } else {
                                    echo '<span class=" text-white badge text-bg-danger">Rusak</span>';
                                }
                            } while (false);
                        ?>
                    </td>
                    <td>{{ $item->jumlah }}</td>
                    <td class="align-middle text-center">
                        @if ($item->foto)
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('storage/' . $item->foto) }}" height="100" alt="{{ $item->nama_barang }}">
                            </div>
                        @else
                            -
                        @endif
                    </td>
                    
                    <td>
                        <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse            
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
