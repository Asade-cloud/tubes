<div class="d-flex">
    <a href="{{ route('barang.show', ['barang' => $barang->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
    <a href="{{ route('barang.edit', ['barang' => $barang->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="fas fa-edit"></i></a>

    <div>
        <form action="{{ route('barang.destroy', ['barang' => $barang->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="fas fa-trash"></i></button>
        </form>
    </div>
</div>
