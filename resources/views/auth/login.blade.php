<!-- Модальне вікно для входу -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Вхід</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input id="loginEmail" type="email" name="email" class="form-control" required autofocus>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Пароль</label>
                        <input id="loginPassword"" type="password" name="password" class="form-control" required>
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-3 form-check">
                        <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                        <label for="remember_me" class="form-check-label">Запам'ятати мене</label>
                    </div>

                    <!-- Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-primary">Забули пароль?</a>
                        @endif
                    </div>

                    <!-- Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Увійти</button>
                    </div>

                    <!-- Register -->
                    <div class="text-center mt-3">
                        <p>Ще не маєте акаунта?
                            <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Зареєструйтесь тут!</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

