<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Inventaris</h2>
        <a href="{{ route('inventaris.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <form action="{{ route('inventaris.update', $inventaris->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $inventaris->nama_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="baik" {{ $inventaris->status == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ $inventaris->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $inventaris->jumlah }}" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                @if ($inventaris->foto)
                    <div class="my-2">
                        <img src="{{ asset('storage/' . $inventaris->foto) }}" height="100" alt="{{ $inventaris->nama_barang }}">
                    </div>
                @endif
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
