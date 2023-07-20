<div class="d-flex">
    <a href="{{ route('merek.edit', ['merek' => $merek->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="fas fa-edit"></i></a>

    <div>
        <form action="{{ route('merek.destroy', ['merek' => $merek->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="fas fa-trash"></i></button>
        </form>
    </div>
</div>
