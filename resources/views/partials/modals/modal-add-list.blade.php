<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST')
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addListModalLabel">Add List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>