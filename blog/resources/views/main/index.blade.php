
@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">
            Блог о технологиях и разработке
        </h1>

        @php
            $featuredPosts = [
                [
                    'title' => 'Искусственный интеллект меняет веб-разработку',
                    'category' => 'Искусственный интеллект',
                    'image' => 'photo-1677442136019-21780ecad995',
                    'description' => 'Как AI помогает разработчикам писать код, находить ошибки и создавать современные приложения.'
                ],
                [
                    'title' => 'React и Next.js: что выбрать для нового проекта?',
                    'category' => 'Frontend',
                    'image' => 'photo-1633356122544-f134324a6cee',
                    'description' => 'Разбираемся в преимуществах React и Next.js для создания современных сайтов.'
                ],
                [
                    'title' => 'PHP в 2026 году: почему язык всё ещё актуален',
                    'category' => 'Backend',
                    'image' => 'photo-1461749280684-dccba630e2f6',
                    'description' => 'Современный PHP, Laravel, производительность и перспективы серверной разработки.'
                ],
            ];

            $posts = [
                [
                    'title' => 'Как начать изучать программирование с нуля',
                    'category' => 'Обучение',
                    'image' => 'photo-1516321318423-f06f85e504b3',
                ],
                [
                    'title' => 'Laravel: создание полноценного REST API',
                    'category' => 'Backend',
                    'image' => 'photo-1555066931-4365d14bab8c',
                ],
                [
                    'title' => 'TypeScript против JavaScript: основные отличия',
                    'category' => 'Frontend',
                    'image' => 'photo-1515879218367-8466d910aaa4',
                ],
                [
                    'title' => 'Docker для разработчика: первые шаги',
                    'category' => 'DevOps',
                    'image' => 'photo-1605745341112-85968b19335b',
                ],
                [
                    'title' => 'Оптимизация MySQL: индексы и сложные запросы',
                    'category' => 'Базы данных',
                    'image' => 'photo-1544383835-bda2bc66a55d',
                ],
                [
                    'title' => 'Как создать адаптивный сайт на HTML и CSS',
                    'category' => 'Веб-дизайн',
                    'image' => 'photo-1498050108023-c5249f4df085',
                ],
                [
                    'title' => 'Git и GitHub: управление версиями проекта',
                    'category' => 'Инструменты',
                    'image' => 'photo-1556075798-4825dfaaf498',
                ],
                [
                    'title' => 'Безопасность веб-приложений: основные угрозы',
                    'category' => 'Безопасность',
                    'image' => 'photo-1563013544-824ae1b704d3',
                ],
            ];

            $popularPosts = array_slice($posts, 0, 4);
        @endphp

        <section class="featured-posts-section">
            <div class="row">
                @foreach($featuredPosts as $post)
                    <div class="col-md-4 fetured-post blog-post"
                         data-aos="fade-up">

                        <div class="blog-post-thumbnail-wrapper">
                            <img
                                src="https://images.unsplash.com/{{ $post['image'] }}?auto=format&fit=crop&w=900&q=85"
                                alt="{{ $post['title'] }}"
                                loading="lazy"
                                style="width:100%; height:240px; object-fit:cover;"
                            >
                        </div>

                        <p class="blog-post-category">
                            {{ $post['category'] }}
                        </p>

                        <a href="#!" class="blog-post-permalink">
                            <h6 class="blog-post-title">
                                {{ $post['title'] }}
                            </h6>
                        </a>

                        <p class="text-muted">
                            {{ $post['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>

        <div class="row">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row">
                        @foreach($posts as $post)
                            <div class="col-md-6 blog-post"
                                 data-aos="fade-up">

                                <div class="blog-post-thumbnail-wrapper">
                                    <img
                                        src="https://images.unsplash.com/{{ $post['image'] }}?auto=format&fit=crop&w=800&q=85"
                                        alt="{{ $post['title'] }}"
                                        loading="lazy"
                                        style="width:100%; height:220px; object-fit:cover;"
                                    >
                                </div>

                                <p class="blog-post-category">
                                    {{ $post['category'] }}
                                </p>

                                <a href="#!" class="blog-post-permalink">
                                    <h6 class="blog-post-title">
                                        {{ $post['title'] }}
                                    </h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>

            <div class="col-md-4 sidebar" data-aos="fade-left">

                <div class="widget widget-post-carousel">
                    <h5 class="widget-title">
                        Рекомендуем прочитать
                    </h5>

                    <div class="post-carousel">
                        <div id="carouselId"
                             class="carousel slide"
                             data-ride="carousel">

                            <ol class="carousel-indicators">
                                @foreach($featuredPosts as $post)
                                    <li
                                        data-target="#carouselId"
                                        data-slide-to="{{ $loop->index }}"
                                        class="{{ $loop->first ? 'active' : '' }}">
                                    </li>
                                @endforeach
                            </ol>

                            <div class="carousel-inner" role="listbox">
                                @foreach($featuredPosts as $post)
                                    <figure class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img
                                            src="https://images.unsplash.com/{{ $post['image'] }}?auto=format&fit=crop&w=700&q=85"
                                            alt="{{ $post['title'] }}"
                                            style="width:100%; height:240px; object-fit:cover;"
                                        >

                                        <figcaption class="post-title">
                                            <a href="#!">
                                                {{ $post['title'] }}
                                            </a>
                                        </figcaption>
                                    </figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget widget-post-list">
                    <h5 class="widget-title">
                        Популярные статьи
                    </h5>

                    <ul class="post-list">
                        @foreach($popularPosts as $post)
                            <li class="post">
                                <a href="#!" class="post-permalink media">
                                    <img
                                        src="https://images.unsplash.com/{{ $post['image'] }}?auto=format&fit=crop&w=200&q=80"
                                        alt="{{ $post['title'] }}"
                                        loading="lazy"
                                        style="width:90px; height:75px; object-fit:cover;"
                                    >

                                    <div class="media-body">
                                        <h6 class="post-title">
                                            {{ $post['title'] }}
                                        </h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="widget">
                    <h5 class="widget-title">
                        Категории
                    </h5>

                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a href="#!">Frontend-разработка</a>
                        </li>
                        <li class="mb-3">
                            <a href="#!">Backend-разработка</a>
                        </li>
                        <li class="mb-3">
                            <a href="#!">Искусственный интеллект</a>
                        </li>
                        <li class="mb-3">
                            <a href="#!">Базы данных</a>
                        </li>
                        <li class="mb-3">
                            <a href="#!">DevOps и серверы</a>
                        </li>
                        <li class="mb-3">
                            <a href="#!">Информационная безопасность</a>
                        </li>
                    </ul>

                    <img
                        src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=700&q=85"
                        alt="Современные технологии"
                        class="w-100"
                        loading="lazy"
                    >
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
