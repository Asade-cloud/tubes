<div class="d-flex">
    <div>
        <form action="{{ route('barangmasuk.destroy', ['barangmasuk' => $barangmasuk->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="fas fa-trash"></i></button>
        </form>
    </div>
</div>
