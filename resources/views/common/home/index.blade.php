<!DOCTYPE html>
<html lang="en">
<head>
    <title>টিভি মেলা ২০২২</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/custom.css">

    <meta property="og:image" content="{{ $thumbnail }}"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="375"/>
    <meta property="og:title" content="{{ $fb_title }} ">
    <meta property="og:description"
          content="{{ $fb_sub_title }}">

    <style>
        .hero-area{
            padding: 50px 0px;
            background: #f7f7f7;
        }
        .navbar-area{
            background: #fff;
            border-bottom: 1px solid #dfdddd;
        }
        .carousel {
            position: relative;
            padding: 25px 0px;
        }

        .card{
            border: 1px solid;
            border-color: #cecece !important;
        }
        a {
            color: #35363a;
            text-decoration: none;
        }

        .news{
            background-color: #f1f1f1;
            padding: 35px 0px;
        }

        .copyright-area{
            padding: 25px 0px;
        }

        h2{
            font-size: 20px;
        }

        .nav-item{
            font-weight: bold;
        }

        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        #loading-image {
            z-index: 100;
        }
        .ts-contact{
            background-color: #f8f8f8;
            padding: 25px 0px;
        }
    </style>


</head>
<body>

<div id="loading">
    <img id="loading-image" src="/images/loader.gif" alt="Loading..." />
</div>

<div class="navbar-area">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/"> <img src="/images/tv_mela_Logo.png" width="120px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="/">হোম </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#news">খবর </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#video">ভিডিও </a>
                    </li>

                </ul>
                <form class="d-flex">
                    <a target="_blank" href="https://www.prothomalo.com/"> <img src="/images/p_alo.png" width="130px"
                                                                                alt=""></a>
                </form>
            </div>
        </div>
    </nav>

</div>

<div class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/images/numonic.png" style=" width: 80%"/>
            </div>
            <div class="col-md-6">

                <h1> বিনোদন ও খেলা উপভোগের অন্যতম অনুষঙ্গ টেলিভিশন।</h1>

                <p>২০ নভেম্বর কাতারে শুরু হচ্ছে ফিফা আয়োজিত দ্য গ্রেটেস্ট শো অন আর্থ ‘ফুটবল বিশ্বকাপ ২০২২’। সারা
                    বিশ্বের মতো বিশ্বকাপ–উন্মাদনা শুরু হয়ে গেছে বাংলাদেশেও। প্রিয় দল ও প্রিয় তারকার খেলা দেখার জন্য
                    অনেকেই প্রস্তুতি নিচ্ছেন নতুন টিভি কেনার।
                    বাংলাদেশে টিভির বাজার, দেশি-বিদেশি বিভিন্ন ব্র্যান্ডের টিভির খোঁজ ও বৈশিষ্ট্য, দরদাম, চলতি
                    অফারসহ টিভির আদ্যোপান্ত নিয়ে প্রথম আলো ডিজিটালের বিশেষ আয়োজন।</p>
            </div>
        </div>
    </div>
</div>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel" data-interval="500">

    <div class="container">

        <!-- Indicators/dots -->
        {{--<div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>--}}

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">

            @if(count($sliders)>0)
                <div class="carousel-item active">
                    <img src="{{$sliders[0]->featured_image}}" alt="Los Angeles" class="d-block w-100">
                </div>
            @endif
            @foreach($sliders as $slider)
                <div class="carousel-item">
                    <img src="{{$slider->featured_image}}" alt="Los Angeles" class="d-block w-100">
                </div>
            @endforeach

            {{--<div class="carousel-item">
                <img src="ny.jpg" alt="New York" class="d-block w-100">
            </div>--}}
        </div>

        <!-- Left and right controls/icons -->
       {{-- <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>--}}
    </div>
</div>




<section class="ts-contact " style="background-color: #f1f1f1;">
    <div class="container">
        <div class="row mb-25">
            <div class="col-lg-12">
                <div class="elementor-widget-container">
                    <div class="row ">
                        <div class="col-lg-3 col-6 fadeInUp mt-4 wow fadeInUp" data-wow-duration="1.5s"
                             data-wow-delay="300ms">
                            <div class="card p-2" style="border: 1px solid; border-color: #9f9f9f">
                                <a href="https://www.samsung.com/bd/tvs/all-tvs/" target="_blank">
                                    <div class="post-header mx-auto">
                                        <img src="/images/photos/1667980519.jpg"
                                             class="img-responsive mb-2" width="100%"
                                             alt="--">

                                    </div>
                                </a>


                                <!-- post-body end -->
                            </div>
                            <!-- post end-->
                        </div>
                        @foreach($photos as $res)

                            <div class="col-lg-3 col-6 fadeInUp mt-4 wow fadeInUp" data-wow-duration="1.5s"
                                 data-wow-delay="300ms">
                                <div class="card p-2" style="border: 1px solid; border-color: #9f9f9f">
                                    <a href="{{$res->url}}" target="_blank">
                                        <div class="post-header mx-auto">
                                            <img src="{{$res->featured_image}}"
                                                 class="img-responsive mb-2" width="100%"
                                                 alt="--">

                                        </div>
                                    </a>


                                    <!-- post-body end -->
                                </div>
                                <!-- post end-->
                            </div>
                        @endforeach

                    </div> <!-- row end -->
                </div>
            </div><!-- col end-->

        </div>

    </div>

</section>

@if(count($videos1)>0)

    <section class="ts-contact" style="background-color: #f8f8f8;" id="video">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title text-center">
                        <li class="nav-item" style="list-style: none">
                            <a href="#video">শোরুম ভিজিট</a>
                        </li>
                    </h2>
                    <div class="elementor-widget-container">
                        <div class="row ">
                            @foreach($videos1 as $res)

                                <div class="col-lg-4 fadeInUp mt-3 wow fadeInUp" data-wow-duration="1.5s"
                                     data-wow-delay="300ms">
                                    <div class="card p-1">
                                        <div class="post-header mx-auto">
                                            <iframe width="100%" height="230"
                                                    src="{{$res->video_link}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>


                                        </div>
                                        <div class="post-body mx-auto">
                                            <div class="post-meta">

                                                <h2>{{$res->video_title}}</h2>

                                            </div>

                                        </div>
                                        <!-- post-body end -->
                                    </div>
                                    <!-- post end-->
                                </div>
                            @endforeach

                        </div> <!-- row end -->

                    </div>
                </div><!-- col end-->

            </div>

        </div>

    </section>
@endif

@if(count($videos2)>0)

    <section class="ts-contact" style="background-color: #f8f8f8;" id="video">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title text-center">
                        <li class="nav-item" style="list-style: none">
                            <a href="#video">তারকাদের পছন্দ</a>
                        </li>
                    </h2>
                    <div class="elementor-widget-container">
                        <div class="row ">
                            @foreach($videos2 as $res)

                                <div class="col-lg-4 fadeInUp mt-3 wow fadeInUp" data-wow-duration="1.5s"
                                     data-wow-delay="300ms">
                                    <div class="card p-1">
                                        <div class="post-header mx-auto">
                                            <iframe width="100%" height="230"
                                                    src="{{$res->video_link}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>


                                        </div>
                                        <div class="post-body mx-auto">
                                            <div class="post-meta">

                                                <h2>{{$res->video_title}}</h2>

                                            </div>

                                        </div>
                                        <!-- post-body end -->
                                    </div>
                                    <!-- post end-->
                                </div>
                            @endforeach

                        </div> <!-- row end -->

                    </div>
                </div><!-- col end-->

            </div>

        </div>

    </section>
@endif
@if(count($videos3)>0)

    <section class="ts-contact" style="background-color: #f8f8f8;" id="video">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title text-center">
                        <li class="nav-item" style="list-style: none">
                            <a href="#video">টিভি মেলার আদ্যোপান্ত</a>
                        </li>
                    </h2>
                    <div class="elementor-widget-container">
                        <div class="row ">
                            @foreach($videos3 as $res)

                                <div class="col-lg-4 fadeInUp mt-3 wow fadeInUp" data-wow-duration="1.5s"
                                     data-wow-delay="300ms">
                                    <div class="card p-1">
                                        <div class="post-header mx-auto">
                                            <iframe width="100%" height="230"
                                                    src="{{$res->video_link}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>


                                        </div>
                                        <div class="post-body mx-auto">
                                            <div class="post-meta">

                                                <h2>{{$res->video_title}}</h2>

                                            </div>

                                        </div>
                                        <!-- post-body end -->
                                    </div>
                                    <!-- post end-->
                                </div>
                            @endforeach

                        </div> <!-- row end -->

                    </div>
                </div><!-- col end-->

            </div>

        </div>

    </section>
@endif

@if(count($news)>0)
    <section class="news" style="background-color: #f1f1f1;" id="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                      <h2 class="section-title text-center">
                          <li class="nav-item" style="list-style: none">
                              <a href="#status">খবর </a>
                          </li>
                      </h2>
                    <div class="elementor-widget-container">
                        <div class="row ">
                            @foreach($news as $res)

                                <div class="col-lg-4 fadeInUp mt-3 wow fadeInUp" data-wow-duration="1.5s"
                                     data-wow-delay="300ms">
                                    <div class="card p-3" style="border: 1px solid; border-color: #9f9f9f">
                                        <div class="post-header mx-auto">
                                            <img src="{{$res->featured_image}}" height="225px"
                                                 class="img-responsive mb-2" width="100%"
                                                 alt="--">

                                        </div>
                                        <div class="post-body mx-auto">
                                            <div class="post-meta">
                                                <a class="" href="{{$res->news_link}}" target="_blank">
                                                    <h2>{{$res->title}}</h2>
                                                </a>
                                            </div>

                                            <div class="post-footer " style="cursor: pointer; color:#0d51a0 ">
                                                <a href="{{$res->news_link}}" target="_blank">
                                                    Continue <i class="icon icon-arrow-right"></i></a>

                                            </div>


                                        </div>
                                        <!-- post-body end -->
                                    </div>
                                    <!-- post end-->
                                </div>
                            @endforeach

                        </div> <!-- row end -->
                        {{--    <section class="ts-contact" id="news2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="elementor-widget-container">
                                                <div class="row ">
                                                    @foreach($news2 as $res)

                                                        <div class="col-lg-4 fadeInUp mt-3 wow fadeInUp"
                                                             data-wow-duration="1.5s" data-wow-delay="300ms">
                                                            <div class="card p-3"
                                                                 style="border: 1px solid; border-color: #9f9f9f">
                                                                <div class="post-header mx-auto">
                                                                    <img src="{{$res->featured_image}}" height="225px"
                                                                         class="img-responsive mb-2" width="100%"
                                                                         alt="--">

                                                                </div>
                                                                <div class="post-body mx-auto">
                                                                    <div class="post-meta">
                                                                        <a class="" href="{{$res->news_link}}"
                                                                           target="_blank">
                                                                            <h2>{{$res->title}}</h2>
                                                                        </a>
                                                                    </div>

                                                                    <div class="post-footer "
                                                                         style="cursor: pointer; color:#0d51a0 ">
                                                                        <a href="{{$res->news_link}}" target="_blank">
                                                                            Continue <i
                                                                                class="icon icon-arrow-right"></i></a>

                                                                    </div>


                                                                </div>
                                                                <!-- post-body end -->
                                                            </div>
                                                            <!-- post end-->
                                                        </div>
                                                    @endforeach

                                                </div> <!-- row end -->
                                            </div>
                                        </div><!-- col end-->

                                    </div>

                                </div>

                            </section>
                            @if(count($news2) >0)
                                <div class="row">
                                    <div class="mx-auto mt-2" id="newsbtn">
                                        <button onclick="moreNews()" class="btn  btn-primary ">More</button>
                                    </div>
                                </div>
                            @endif--}}


                    </div>
                </div><!-- col end-->

            </div>

        </div>

    </section>
@endif

<div class="copyright-area">
    <div class="container">
        <div class="copyright-area-content">
            <div class="row">
                <div class="col-md-10 col-12 mx-auto">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <img src="/images/palologoblack.png" class="footer-logo" style="height: 75px">

                        </div>
                        <div class="col-md-6 col-12">
                            <p class="footer-p">
                                কপিরাইট ©
                                <a href="https://www.prothomalo.com/" target="_blank">
                                    প্রথম আলো ডিজিটাল
                                </a>
                                <br>
                                প্রগতি ইনস্যুরেন্স ভবন, ২০-২১ কারওয়ান বাজার, ঢাকা ১২১৫। <br>ফোন: ৮১৮০০৭৮-৮১</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


    <script>
        $(window).on('load', function () {
        $('#loading').hide();
    })

</script>
</body>
</html>
