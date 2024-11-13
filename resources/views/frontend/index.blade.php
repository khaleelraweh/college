@extends('layouts.app')

@section('content')
    <!-- Slider Section Start -->
    <div class="rs-slider main-home">
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true"
            data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false"
            data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false"
            data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false"
            data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1"
            data-md-device-nav="true" data-md-device-dots="false">

            @forelse ($main_sliders->where('section' ,1) as $main_slider)
                @php
                    if ($main_slider->firstMedia != null && $main_slider->firstMedia->file_name != null) {
                        $main_slider_img = asset('assets/main_sliders/' . $main_slider->firstMedia->file_name);

                        if (!file_exists(public_path('assets/main_sliders/' . $main_slider->firstMedia->file_name))) {
                            // $main_slider_img = asset('image/not_found/item_image_not_found.webp');
                            $main_slider_img = asset('frontend/images/slider/main-home/1.jpg');
                        }
                    } else {
                        // $main_slider_img = asset('image/not_found/item_image_not_found.webp');
                        $main_slider_img = asset('frontend/images/slider/main-home/1.jpg');
                    }
                @endphp
                <div class="slider-content slide1" style="background-image: url({{ $main_slider_img }})">
                    {{-- <div class="container" style="height: 150vh;"> --}}
                    <div class="container">
                        @if ($main_slider->show_info)
                            <div class="content-part">
                                <div class="sl-sub-title wow bounceInLeft" data-wow-delay="300ms"
                                    data-wow-duration="2000ms">
                                    {{ $main_slider->subtitle }}
                                </div>
                                <h1 class="sl-title wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">
                                    {{ $main_slider->title }}
                                </h1>
                                @if ($main_slider->show_btn_title)
                                    <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                        <a class="readon orange-btn main-home"
                                            href="{{ url($main_slider->btn_title) }}">{{ $main_slider->btn_title }}
                                        </a>
                                    </div>
                                @endif

                            </div>
                        @endif
                    </div>

                </div>
            @empty
            @endforelse
        </div>

        <!-- Features Section start -->
        <div id="rs-features" class="rs-features main-home">
            <div class="container">
                <div class="row">

                    @foreach ($main_sliders->where('section', 2)->take(3) as $adv_slider)
                        <div class="col-lg-4 col-md-12 md-mb-30 ">
                            <div class="features-wrap ">

                                <div class="icon-part">

                                    @php
                                        if (
                                            $adv_slider->firstMedia != null &&
                                            $adv_slider->firstMedia->file_name != null
                                        ) {
                                            $advertisor_slider_img = asset(
                                                'assets/advertisor_sliders/' . $adv_slider->firstMedia->file_name,
                                            );

                                            if (
                                                !file_exists(
                                                    public_path(
                                                        'assets/advertisor_sliders/' .
                                                            $adv_slider->firstMedia->file_name,
                                                    ),
                                                )
                                            ) {
                                                // $advertisor_slider_img = asset('image/not_found/item_image_not_found.webp');
                                                $advertisor_slider_img = asset('frontend/images/features/icon/3.png');
                                            }
                                        } else {
                                            // $advertisor_slider_img = asset('image/not_found/item_image_not_found.webp');
                                            $advertisor_slider_img = asset('frontend/images/features/icon/3.png');
                                        }
                                    @endphp

                                    {{-- <i class="{{ $adv_slider->icon }}"></i> --}}
                                    <img src="{{ $advertisor_slider_img }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h4 class="title">
                                        <span class="watermark">{{ $adv_slider->title }}</span>
                                    </h4>
                                    <p class="dese">
                                        {{ $adv_slider->subtitle }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Features Section End -->
    </div>
    <!-- Slider Section End -->



    <!-- news  Section Start -->
    <div id="rs-blog" class="rs-blog rs-news-events main-home pt-94 pb-70 md-pt-64 md-pb-70 bg4">
        <div class="container">
            <div class="sec-title mb-40 md-mb-20 text-left">
                <h2 class="title mb-0 header-news">{{ __('panel.college_news') }}</h2>
            </div>
            <div class="row ">
                <div class="col-sm-12 col-md-6 col-lg-5 ">
                    <!-- Display Only the Newest News Item -->
                    @if ($news->first())
                        @php
                            $item = $news->last();
                        @endphp

                        @php
                            if ($item->photos->first() != null && $item->photos->first()->file_name != null) {
                                $item_img = asset('assets/news/' . $item->photos->first()->file_name);

                                if (!file_exists(public_path('assets/news/' . $item->photos->first()->file_name))) {
                                    $item_img = asset('image/not_found/item_image_not_found.webp');
                                }
                            } else {
                                $item_img = asset('image/not_found/item_image_not_found.webp');
                            }
                        @endphp

                        <div class="blog-item">
                            <div class="image-part">
                                <img src="{{ $item_img }}" alt="" style="width: 100%;">
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li>
                                        <?php
                                        $date = $item->created_at;
                                        $higriShortDate = Alkoumi\LaravelHijriDate\Hijri::ShortDate($date);
                                        ?>
                                        <i class="fa fa-calendar"></i>
                                        {{ $higriShortDate . ' ' . __('panel.calendar_hijri') }}
                                        <span>{{ __('panel.corresponding_to') }} </span>
                                        {{ $item->created_at->isoFormat('YYYY/MM/DD') . ' ' . __('panel.calendar_gregorian') }}
                                    </li>
                                </ul>

                                <h3 class="title">
                                    <a href="{{ route('frontend.news_single', $item->slug) }}">
                                        {!! \Illuminate\Support\Str::words($item->title, 8, '...') !!}
                                    </a>
                                </h3>

                                <div class="desc">
                                    {!! \Illuminate\Support\Str::words($item->content, 10, '...') !!}
                                </div>
                                <div class="btn-btm">
                                    <div class="cat-list"></div>
                                    <div class="rs-view-btn">
                                        <a
                                            href="{{ route('frontend.news_single', $item->slug) }}">{{ __('panel.read_more') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12 col-md-6 col-lg-7">
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30"
                        data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                        data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                        data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                        data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false"
                        data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                        data-md-device="2" data-md-device-nav="false" data-md-device-dots="false">
                        @foreach ($news as $item)
                            <div class="blog-item">
                                <div class="image-part">
                                    @php
                                        if (
                                            $item->photos->first() != null &&
                                            $item->photos->first()->file_name != null
                                        ) {
                                            $item_img = asset('assets/news/' . $item->photos->first()->file_name);

                                            if (
                                                !file_exists(
                                                    public_path('assets/news/' . $item->photos->first()->file_name),
                                                )
                                            ) {
                                                $item_img = asset('image/not_found/item_image_not_found.webp');
                                            }
                                        } else {
                                            $item_img = asset('image/not_found/item_image_not_found.webp');
                                        }
                                    @endphp
                                    <img src="{{ $item_img }}" alt="">
                                </div>
                                <div class="blog-content">

                                    <ul class="blog-meta">
                                        {{-- <li><i class="fa fa-user-o"></i> {{ $item->created_by }}</li> --}}
                                        <li>
                                            <?php
                                            $date = $item->created_at;
                                            $higriShortDate = Alkoumi\LaravelHijriDate\Hijri::ShortDate($date); // With optional Timestamp It will return Hijri Date of [$date] => Results "1442/05/12"
                                            ?>
                                            <i class="fa fa-calendar"></i>
                                            {{ $higriShortDate . ' ' . __('panel.calendar_hijri') }}
                                            <span>{{ __('panel.corresponding_to') }} </span>
                                            {{ $item->created_at->isoFormat('YYYY/MM/DD') . ' ' . __('panel.calendar_gregorian') }}

                                        </li>

                                    </ul>

                                    <h3 class="title">
                                        <a href="{{ route('frontend.news_single', $item->slug) }}">

                                            {!! \Illuminate\Support\Str::words($item->title, 8, '...') !!}

                                        </a>
                                    </h3>

                                    <div class="desc">
                                        {!! \Illuminate\Support\Str::words($item->content, 10, '...') !!}
                                    </div>
                                    <div class="btn-btm">
                                        <div class="cat-list">

                                        </div>
                                        <div class="rs-view-btn">
                                            <a
                                                href="{{ route('frontend.news_single', $item->slug) }}">{{ __('panel.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news  Section End -->

    <!-- CTA Section Start -->
    <div class="rs-cta section-wrap gray-bg">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="img-part">
                    <img src="{{ asset('frontend/images/cta/home1.jpg') }}" alt="Image">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                <div class="content">
                    <div class="sec-title mb-40 ">
                        <h2 class="title">Admission Open for 2020</h2>
                        <div class="desc">We denounce with righteous indignation and dislike men who are so beguiled and
                            demoralized by the charms of pleasure of your moment, so blinded by desire those who fail in
                            their duty through weakness. These cases are perfectly simple and easy every pleasure is to be
                            welcomed and every pain avoided.</div>
                    </div>
                    <div class="btn-part">
                        <a class="readon banner-style uppercase" href="#">ready more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Section End -->

    <!-- CTA Section Start -->
    {{-- <div class="rs-cta main-home">
        <div class="partition-bg-wrap">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-6"></div>
                    <div class="col-lg-6 pl-70 md-pl-15">
                        <div class="sec-title3 mb-40">
                            <h2 class="title white-color mb-16">20% Offer Running - Join Today</h2>
                            <div class="desc white-color pr-100 md-pr-0">We denounce with righteous indignation and
                                dislike men who are so beguiled and demoralized by the charms of pleasure of your
                                moment, so blinded by desire those who fail in their duty through weakness. These
                                cases are perfectly simple and easy every pleasure is to be welcomed and every pain
                                avoided.</div>
                        </div>
                        <div class="btn-part">
                            <a class="readon orange-btn transparent" href="#">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- CTA Section End -->


    <!-- Section bg Wrap 2 start -->
    <div class="bg2">
        <!-- Blog Section Start -->
        <div id="rs-blog" class="rs-blog style1 pt-94 pb-100 md-pt-64 md-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 pr-75 md-pr-15 md-mb-50">
                        <div class="sec-title3 mb-50 md-mb-30">
                            <h2 class="title header-advertisements main-color">{{ __('panel.college_advertisements') }}
                            </h2>
                        </div>

                        @foreach ($advertisements->take(3) as $index => $advertisement)
                            <div class="row align-items-center no-gutter white-bg blog-item {{ $loop->last ? '' : 'mb-30' }}  wow fadeInUp"
                                data-wow-delay="{{ ($index + 3) * 100 }}ms" data-wow-duration="2000ms">
                                <div class="col-md-6">
                                    <div class="image-part">
                                        <a href="{{ route('frontend.advertisement_single', $advertisement->slug) }}">
                                            @php
                                                if (
                                                    $advertisement->photos->first() != null &&
                                                    $advertisement->photos->first()->file_name != null
                                                ) {
                                                    $advertisement_img = asset(
                                                        'assets/advs/' . $advertisement->photos->first()->file_name,
                                                    );

                                                    if (
                                                        !file_exists(
                                                            public_path(
                                                                'assets/advs/' .
                                                                    $advertisement->photos->first()->file_name,
                                                            ),
                                                        )
                                                    ) {
                                                        $advertisement_img = asset(
                                                            'image/not_found/item_image_not_found.webp',
                                                        );
                                                    }
                                                } else {
                                                    $advertisement_img = asset(
                                                        'image/not_found/item_image_not_found.webp',
                                                    );
                                                }
                                            @endphp
                                            <img src="{{ $advertisement_img }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            {{-- <li><i class="fa fa-user-o"></i> Admin</li> --}}
                                            <li>
                                                <i class="fa fa-calendar"></i>
                                                {{ formatPostDateDash($advertisement->created_at) }}
                                            </li>
                                        </ul>
                                        <h3 class="title">
                                            <a href="{{ route('frontend.advertisement_single', $advertisement->slug) }}">
                                                {!! \Illuminate\Support\Str::words($item->title, 8, '...') !!}
                                            </a>
                                        </h3>
                                        <div class="btn-part">
                                            <a class="readon-arrow"
                                                href="{{ route('frontend.advertisement_single', $advertisement->slug) }}">{{ __('panel.read_more') }}</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="col-lg-5 lg-pl-0">
                        <div class="sec-title3 mb-50 md-mb-30">
                            <h2 class="title  header-events main-color">{{ __('panel.college_activities') }}
                            </h2>
                        </div>
                        @foreach ($events->take(4) as $index => $event)
                            <div class="events-short  {{ $loop->last ? '' : 'mb-30' }} wow fadeInUp"
                                data-wow-delay="{{ ($index + 1) * 100 }}ms" data-wow-duration="2000ms">
                                <div class="date-part">

                                    <div class="date mb-10">
                                        {{ $event->created_at->format('d') }}
                                    </div>
                                    <span class="month mb-0">
                                        {{ $event->created_at->translatedFormat('F Y') }}
                                    </span>
                                </div>
                                <div class="content-part">
                                    {{-- <div class="categorie">
                                        <a href="#">Math</a> & <a href="#">English</a>
                                    </div> --}}
                                    <h4 class="title mb-0">
                                        <a href="{{ route('frontend.event_single', $event->slug) }}">
                                            {{ $event->title }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Section bg Wrap 2 End -->

    <!-- College and Institutes Start  -->
    <div class="rs-degree rs-college-institute style1 modify  pt-100 pb-100 md-pt-70 md-pb-70 bg6">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-2 col-md-12 mb-30">
                    <div class="sec-title wow fadeInUp text-center " data-wow-delay="300ms" data-wow-duration="2000ms">
                        <h3 class="title mb-0 header-colleges">{{ __('panel.scientific_departments') }}</h3>
                        {{-- <div class=" primary header-college-subtitle">{{ __('panel.introductory_tour') }}</div> --}}
                    </div>
                </div>
                <div class="col-lg-10 col-md-12 mb-30">
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                        data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                        data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                        data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                        data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false"
                        data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                        data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                        @foreach ($web_menus->where('section', 2) as $college_menu)
                            <div class="blog-item">
                                <div class="degree-wrap">
                                    @php
                                        if (
                                            $college_menu->photos->first() != null &&
                                            $college_menu->photos->first()->file_name != null
                                        ) {
                                            $college_menu_img = asset(
                                                'assets/college_menus/' . $college_menu->photos->first()->file_name,
                                            );

                                            if (
                                                !file_exists(
                                                    public_path(
                                                        'assets/college_menus/' .
                                                            $college_menu->photos->first()->file_name,
                                                    ),
                                                )
                                            ) {
                                                $college_menu_img = asset('frontend/images/degrees/1.jpg');
                                            }
                                        } else {
                                            $college_menu_img = asset('frontend/images/degrees/1.jpg');
                                        }
                                    @endphp

                                    <img src="{{ $college_menu_img }}" alt="">
                                    <div class="title-part">
                                        <h4 class="title">{{ $college_menu->title }}</h4>
                                    </div>
                                    <div class="content-part">
                                        <h4 class="title"><a href="#">{{ $college_menu->title }}</a></h4>
                                        <p class="desc">
                                            {!! $college_menu->description !!}
                                        </p>
                                        <div class="btn-part">
                                            <a href="#">{{ __('panel.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- College and Institutes End -->

    <!-- start statistics -->
    <div class=" main-home event-bg rs-statistics pt-100 pb-100 md-pt-70 md-pb-70 bg12">
        {{-- <div class=" main-home event-bg rs-statistics pt-100 pb-100 md-pt-70 md-pb-70 bg2"> --}}
        <div class="rs-counter style2-about">
            <div class="container">
                <div class="sec-title mb-40 md-mb-40 text-left">
                    <h2 class="title mb-0 header-statistics">{{ __('panel.statistics_and_numbers') }}</h2>
                </div>
                <div class="row couter-area">
                    @foreach ($statistics as $statistic)
                        <div
                            class="col-lg-3 col-md-6 {{ $loop->last ? '' : 'md-mb-30' }}  {{ !$loop->last && count($statistics) > 4 ? 'lg-mb-70' : ' ' }} ">
                            <div class="counter-item text-center">

                                <div class="statistic-image">
                                    {{-- <img class="image" src="{{ asset('frontend/images/waleed/5.png') }}" alt=""> --}}
                                    @php
                                        if ($statistic->statistic_image != null) {
                                            $statistic_img = asset('assets/statistics/' . $statistic->statistic_image);

                                            if (
                                                !file_exists(
                                                    public_path('assets/statistics/' . $statistic->statistic_image),
                                                )
                                            ) {
                                                $statistic_img = asset('frontend/images/waleed/5.png');
                                            }
                                        } else {
                                            $statistic_img = asset('frontend/images/waleed/5.png');
                                        }
                                    @endphp
                                    <img src="{{ $statistic_img }}" alt="" class="image">

                                </div>
                                <div class="statistic-content">
                                    <h2 class="rs-count">{{ $statistic->statistic_number }}</h2>
                                    <h4 class="title mb-0 ">{{ $statistic->title }}</h4>
                                </div>


                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- end statistics -->

    <!-- Videos Section Start -->
    <div id="rs-blog" class=" rs-faq-part rs-college-videos style1 main-home pb-80 pt-80 md-pt-60 md-pb-60">
        <div class="container">
            <div class="sec-title mb-60 md-mb-30 text-left">
                <h2 class="title mb-0 header_playlist">{{ __('panel.newest_video') }}</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
                data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
                data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4"
                data-md-device-nav="false" data-md-device-dots="false">
                @foreach ($playlists as $playlist)
                    <div class="blog-item">
                        @php
                            if ($playlist->photos->first() != null && $playlist->photos->first()->file_name != null) {
                                $playlist_img = asset('assets/playlists/' . $playlist->photos->first()->file_name);

                                if (
                                    !file_exists(
                                        public_path('assets/playlists/' . $playlist->photos->first()->file_name),
                                    )
                                ) {
                                    $playlist_img = asset('frontend/images/faq/1.jpg');
                                }
                            } else {
                                $playlist_img = asset('frontend/images/faq/1.jpg');
                            }
                        @endphp
                        <div class="img-part media-icon orange-color" style="background-image: url({{ $playlist_img }})">
                            <a class="popup-videos" href="{{ $playlist->videoLinks()->first()->link ?? '' }}">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Videos Section End -->

    <!-- college album Start  -->
    <div class="rs-degree rs-college-album style1 modify gray-bg pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row  album-container">
                <div class="col-lg-3 col-md-12  album-title  md-mb-30">
                    <div class="sec-title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                        {{-- <div class="sub-title primary">{{ __('panel.photo_album') }}</div> --}}
                        <h3 class="title mb-0 header-album text-white">{{ __('panel.photo_album') }}</h3>
                        <div class="primary header-album-subtitle text-white">{{ __('panel.browse_albums') }}</div>
                        {{-- <h3 class="title mb-0">{{ __('panel.browse_albums') }}</h3> --}}
                        <a href="{{ route('frontend.album_list') }}"
                            class="btn album-btn">{{ __('panel.all_photo_albums') }}</a>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12 mt-10 mb-10">
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                        data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                        data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                        data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                        data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false"
                        data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                        data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                        @foreach ($albums as $album)
                            <div class="blog-item degree-wrap">
                                @php
                                    if ($album->statistic_image != null) {
                                        $album_img = asset('assets/albums/' . $album->statistic_image);

                                        if (!file_exists(public_path('assets/albums/' . $album->statistic_image))) {
                                            $album_img = asset('image/not_found/item_image_not_found.webp');
                                        }
                                    } else {
                                        $album_img = asset('image/not_found/item_image_not_found.webp');
                                    }
                                @endphp
                                <img src="{{ $album_img }}" alt="">
                                <div class="title-part">
                                    <a href="{{ route('frontend.album_single', $album->slug) }}">
                                        <h4 class="title">{{ $album->title }}</h4>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- College album End -->



    <!-- Faq Section Start -->
    {{-- <div class="rs-faq-part style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 padding-0">
                    <div class=" main-part">
                        <div class="title mb-40 md-mb-15">
                            <h2 class="text-part">Frequently Asked Questions</h2>
                        </div>
                        <div class="faq-content">
                            <div id="accordion" class="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">What are
                                            the
                                            requirements ?</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo"
                                            aria-expanded="false">Does Educavo offer free courses?</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree"
                                            aria-expanded="false">What is the transfer
                                            application process?</a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapsefour"
                                            aria-expanded="false">What is distance
                                            education?</a>
                                    </div>
                                    <div id="collapsefour" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 padding-0">
                    <div class="img-part media-icon orange-color">
                        <a class="popup-videos" href="https://www.youtube.com/watch?v=atMUy_bPoQI">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- faq Section Start -->


    <!-- Testimonial Section Start -->
    {{-- <div class="rs-testimonial main-home pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title3 mb-50 md-mb-30 text-center">
                <div class="sub-title primary">Testimonial</div>
                <h2 class="title white-color">What Students Saying</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true"
                data-nav="false" data-nav-speed="false" data-md-device="2" data-md-device-nav="false"
                data-md-device-dots="true" data-center-mode="false" data-ipad-device2="1" data-ipad-device-nav2="false"
                data-ipad-device-dots2="true" data-ipad-device="2" data-ipad-device-nav="false"
                data-ipad-device-dots="true" data-mobile-device="1" data-mobile-device-nav="false"
                data-mobile-device-dots="false">
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Mahadi Monsura</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Alex Fenando</a>
                        <span class="designation">English Teacher</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Losis Dcosta</a>
                        <span class="designation">Math Teacher</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Mahadi Monsura</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Alex Fenando</a>
                        <span class="designation">English Teacher</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Losis Dcosta</a>
                        <span class="designation">Math Teacher</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial Section End -->




@endsection
