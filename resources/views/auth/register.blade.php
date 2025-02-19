<!-- Модальне вікно для реєстрації -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Реєстрація</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Ім'я -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Ваше ім'я</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email</label>
                        <input id="registerEmail" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>

                    <!-- Пароль -->
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Пароль</label>
                        <input id="registerPassword" type="password" class="form-control" name="password" required>
                    </div>

                    <!-- Підтвердження пароля -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Підтвердження пароля</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <!-- Кнопка реєстрації -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Зареєструватися</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
