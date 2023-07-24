<div class="d-flex">
    <a href="{{ route('kategori.edit', ['kategori' => $kategori->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="fas fa-edit"></i></a>

    <div>
        <form action="{{ route('kategori.destroy', ['kategori' => $kategori->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="fas fa-trash"></i></button>
        </form>
    </div>
</div>
