@extends('layouts.msd')

@section('title', 'Головна сторінка')


@section('content-top')
<section class="hero bg-light py-5">
    <div class="container d-flex flex-column-reverse flex-md-row align-items-center justify-content-between">
        <!-- Текстова частина -->
        <div class="text-center text-md-start">
            <h1 class="display-4 fw-bold text-primary">Дізнайся більше про котиків</h1>
            <p class="lead text-muted mb-4">Все, що ти хотів знати про котиків, на одному сайті: поради, історії, і наймиліші фото!</p>
            <a href="{{ route('blog.index') }}" class="btn btn-primary btn-lg me-2">Наш блог</a>
            <a href="{{ route('cats.index') }}" class="btn btn-outline-primary btn-lg">Галерея котиків</a>
        </div>

        <!-- Зображення -->
        <div>
            <img src="{{ asset('images/hero-cat.png') }}" alt="Cute Cat" class="img-fluid" style="max-height: 300px;">
        </div>
    </div>
</section>
@endsection



@section('content')
    <section id="about" class="py-5 bg-white scroll-animation">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-4">Про нас</h2>
        <ul class="list-unstyled">
            <li class="mb-3 text-center">
                <strong>Наша місія:</strong>
                <span>“Ми створили цей сайт, щоб зробити світ кращим для котиків і їхніх власників. Наша мета — надихати, ділитися корисною інформацією та створювати спільноту.”</span>
            </li>
            <li class="mb-3 text-center">
                <strong>Що ми пропонуємо:</strong>
                <span>“На нашому сайті ви знайдете поради для догляду за котами, захопливі історії про пухнастих друзів, а також цікаві факти про їхнє життя.”</span>
            </li>
            <li class="mb-3 text-center">
                <strong>Наша команда:</strong>
                <span>“Наша команда складається з людей, які щиро люблять котів і прагнуть допомогти кожному знайти відповіді на свої питання.”</span>
            </li>
        </ul>
    </div>
    <!-- Секція "Про нас" -->




        <div class="container text-center py-5">
            <div class="row align-items-center">
                <div class="col-md-4 mb-4">
                    <a href="{{ route('posts.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center equal-height">
                            <i class="bi bi-heart text-danger fs-1 mb-3"></i>
                            <h5 class="fw-bold">Любов до котиків</h5>
                            <p class="text-muted">Поділіться своєю історією про котиків та надихніть інших любителів!</p>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-4 mb-4">
                    <a href="{{ route('blog.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center equal-height">
                            <i class="bi bi-lightbulb text-warning fs-1 mb-3"></i>
                            <h5 class="fw-bold">Поради</h5>
                            <p class="text-muted">Корисні поради для догляду, виховання та утримання ваших улюбленців</p>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-4 mb-4">
                    <a href="{{ route('register') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center equal-height">
                            <i class="bi bi-people text-primary fs-1 mb-3"></i>
                            <h5 class="fw-bold">Спільнота</h5>
                            <p class="text-muted">Приєднуйтесь до спільноти любителів котиків, спілкуйтесь і діліться історіями</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

    @section('content-gallery')
        <section id="gallery" class="bg-light py-5 scroll-animation">
            <div class="container">
                <h2 class="fw-bold text-center text-primary mb-4">Галерея котиків</h2>
                <p class="text-muted text-center mb-5">
                    Подивись на наймиліших котиків з нашої спільноти 🐾
                </p>
                <div class="row g-4 gallery">
                    @foreach($photos as $photo)
                    <div class="col-md-4" >
                        <div class="card shadow-sm border-0">
                            <a href="{{ asset('storage/' . $photo->image) }}" data-fancybox="gallery" >
                                <img src="{{ asset('storage/' . $photo->image) }}" class="card-img-top rounded" alt="Cute Cat 1">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection

 @section('content-tt')
     <section id="faq" class="py-5">
         <div class="container">
             <h2 class="fw-bold text-center text-primary mb-4">FAQ (Часті запитання)</h2>
             <p class="text-muted text-center mb-5">
                 Тут ви знайдете відповіді на найпоширеніші запитання відвідувачів нашого сайту.
             </p>

             <div class="accordion" id="faqAccordion">
                 <!-- Питання 1 -->
                 <div class="accordion-item">
                     <h2 class="accordion-header" id="faqHeading1">
                         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                             Як додати фото котика?
                         </button>
                     </h2>
                     <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                         <div class="accordion-body">
                             Щоб додати фото котика, натисніть кнопку <strong ><a href="{{ route('cats.index') }}" class="">"Додати фото"</a></strong> у верхньому меню та завантажте файл із вашого пристрою.
                         </div>
                     </div>
                 </div>

                 <!-- Питання 2 -->
                 <div class="accordion-item">
                     <h2 class="accordion-header" id="faqHeading2">
                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                             Як поділитися історією про котика?
                         </button>
                     </h2>
                     <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                         <div class="accordion-body">
                             Ви можете поділитися історією у розділі <strong>"Котячі історії"</strong>. Натисніть кнопку "Додати історію" та введіть текст.
                         </div>
                     </div>
                 </div>

                 <!-- Питання 3 -->
                 <div class="accordion-item">
                     <h2 class="accordion-header" id="faqHeading3">
                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                             Як знайти поради про догляд за котиками?
                         </button>
                     </h2>
                     <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                         <div class="accordion-body">
                             У розділі <strong>"Корисні статті"</strong> ми публікуємо найкращі поради для догляду, виховання та утримання котиків.
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 @endsection

@section('content-rr')
<section id="contacts" class="py-5 bg-light">
         <div class="container text-center">
             <h2 class="fw-bold text-primary mb-4">Зв'яжіться з нами</h2>
             <p class="text-muted mb-4">
                 Якщо у вас є запитання чи пропозиції, ми завжди на зв'язку!
             </p>
             <div class="shadow-sm p-4 bg-white rounded mx-auto" style="max-width: 500px;">
                 <p class="mb-3"><strong>Телефон:</strong> +380 12 345 6789</p>
                 <p class="mb-3"><strong>Email:</strong> <a href="mailto:info@catsite.com" class="text-decoration-none text-primary">info@catsite.com</a></p>
                 <p class="mb-0"><strong>Адреса:</strong> вул. Муркотиків, 10, Київ, Україна</p>
             </div>
         </div>
     </section>

@endsection


