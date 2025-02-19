<!-- Модальне вікно для додавання фото котика -->
<div class="modal fade" id="addCatModal" tabindex="-1" aria-labelledby="addCatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCatModalLabel">Додати фото котика</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cats.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Ім'я котика</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Категорія</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="Мої котики">Мої котики</option>
                            <option value="Вуличні котики">Вуличні котики</option>
                            <option value="Кумедні моменти">Кумедні моменти</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Фото</label>
                        <input type="file" class="form-control form-img" id="image" name="image" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Додати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


