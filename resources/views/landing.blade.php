@extends('layouts.app')
@section('title-body', 'Home')
@section('content')
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
        <main>
            <!--? slider Area Start-->
            <section class="slider-area ">
                <div class="slider-active">
                    <!-- Single Slider -->
                    <div class="single-slider slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-7 col-md-12">
                                    <div class="hero__caption">
                                        <h1 data-animation="fadeInLeft" data-delay="0.2s">Online Voting<br> platform</h1>
                                        <p data-animation="fadeInLeft" data-delay="0.4s">Select Your Favorite Candidates and vote for them.</p>
{{--                                        <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join for Free</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ? services-area -->
            <div class="services-area">
                <div class="container">
                    <div class="row justify-content-sm-center">
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="single-services mb-30">
                                <div class="features-icon">
                                    <img src="assets/img/icon/icon1.svg" alt="">
                                </div>
                                <div class="features-caption">
                                    <h3>{{ \App\Models\Student::all()->count() }}+ Active Students</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="single-services mb-30">
                                <div class="features-icon">
                                    <img src="assets/img/icon/icon2.svg" alt="">
                                </div>
                                <div class="features-caption">
                                    <h3>Election Organized</h3>
                                    <p>{{ \App\Models\Election::all()->count() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="single-services mb-30">
                                <div class="features-icon">
                                    <img src="assets/img/icon/icon3.svg" alt="">
                                </div>
                                <div class="features-caption">
                                    <h3>Life time Votes</h3>
                                    <p>{{ \App\Models\Vote::all()->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Courses area start -->
            <div class="courses-area section-padding40 fix">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="section-tittle text-center mb-55">
                                <h2>Our Ongoing Elections</h2>
                            </div>
                        </div>
                    </div>
                    <div class="courses-actives">
                        <?php
                        $ongoingElecton = \App\Models\Election::where('current_status', '=', 'running')->get();
                        ?>
                            @if(!$ongoingElecton)
                                <div class="properties pb-20">
                                    <div class="properties__card">
                                        <span class="bg-danger text-white"> No Ongoing Election </span>
                                    </div>
                                </div>
                            @endif
                            @foreach($ongoingElecton as $election)
                                <div class="properties pb-20">
                                    <div class="properties__card">
                                        <div class="properties__img overlay1">
                                            <a href="#"><img src="assets/img/gallery/featured1.png" alt=""></a>
                                        </div>
                                        <div class="properties__caption">
                                            <p>{{ $election->name }}</p>
                                            <h3>{{ $election->date.' to ' }}</h3>
                                            <p>{{ $election->description }}</p>
                                            <a href="#" class="border-btn border-btn2">Vote</a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
            <!-- Courses area End -->
            <!--? About Area-1 Start -->
            <section class="about-area1 fix pt-10">
                <div class="support-wrapper align-items-center">
                    <div class="left-content1">
                        <div class="about-icon">
                            <img src="assets/img/icon/about.svg" alt="">
                        </div>
                        <!-- section tittle -->
                        <div class="section-tittle section-tittle2 mb-55">
                            <div class="front-text">
                                <h2 class="">Learn how to use this voting system.</h2>
                                <p>All the instruction will be provided with specifications.</p>
                            </div>
                        </div>
                        <div class="single-features">
                            <div class="features-icon">
                                <img src="assets/img/icon/right-icon.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <p>Select the specific election and enter The Election page.</p>
                            </div>
                        </div>
                        <div class="single-features">
                            <div class="features-icon">
                                <img src="assets/img/icon/right-icon.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <p>Check whether Election has any sub Election on Not.</p>
                            </div>
                        </div>

                        <div class="single-features">
                            <div class="features-icon">
                                <img src="assets/img/icon/right-icon.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <p>Choose Candidates and Vote for him with review.</p>
                            </div>
                        </div>
                    </div>
                    <div class="right-content1">
                        <!-- img -->
                        <div class="right-img">
                            <img src="assets/img/gallery/about.png" alt="">

                            <div class="video-icon" >
{{--                                <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i class="fas fa-play"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Area End -->
            <hr>
{{--            <!--? top subjects Area Start -->--}}
{{--            <div class="topic-area section-padding40">--}}
{{--                <div class="container">--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="col-xl-7 col-lg-8">--}}
{{--                            <div class="section-tittle text-center mb-55">--}}
{{--                                <h2>Explore top subjects</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-3 col-md-4 col-sm-6">--}}
{{--                            <div class="single-topic text-center mb-30">--}}
{{--                                <div class="topic-img">--}}
{{--                                    <img src="assets/img/gallery/topic1.png" alt="">--}}
{{--                                    <div class="topic-content-box">--}}
{{--                                        <div class="topic-content">--}}
{{--                                            <h3><a href="#">Programing</a></h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-4 col-sm-6">--}}
{{--                            <div class="single-topic text-center mb-30">--}}
{{--                                <div class="topic-img">--}}
{{--                                    <img src="assets/img/gallery/topic2.png" alt="">--}}
{{--                                    <div class="topic-content-box">--}}
{{--                                        <div class="topic-content">--}}
{{--                                            <h3><a href="#">Programing</a></h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-4 col-sm-6">--}}
{{--                            <div class="single-topic text-center mb-30">--}}
{{--                                <div class="topic-img">--}}
{{--                                    <img src="assets/img/gallery/topic3.png" alt="">--}}
{{--                                    <div class="topic-content-box">--}}
{{--                                        <div class="topic-content">--}}
{{--                                            <h3><a href="#">Programing</a></h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-4 col-sm-6">--}}
{{--                            <div class="single-topic text-center mb-30">--}}
{{--                                <div class="topic-img">--}}
{{--                                    <img src="assets/img/gallery/topic4.png" alt="">--}}
{{--                                    <div class="topic-content-box">--}}
{{--                                        <div class="topic-content">--}}
{{--                                            <h3><a href="#">Programing</a></h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-4 col-sm-6">--}}
{{--                            <div class="single-topic text-center mb-30">--}}
{{--                                <div class="topic-img">--}}
{{--                                    <img src="assets/img/gallery/topic5.png" alt="">--}}
{{--                                    <div class="topic-content-box">--}}
{{--                                        <div class="topic-content">--}}
{{--                                            <h3><a href="#">Programing</a></h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-4 col-sm-6">--}}
{{--                            <div class="single-topic text-center mb-30">--}}
{{--                                <div class="topic-img">--}}
{{--                                    <img src="assets/img/gallery/topic6.png" alt="">--}}
{{--                                    <div class="topic-content-box">--}}
{{--                                        <div class="topic-content">--}}
{{--                                            <h3><a href="#">Programing</a></h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-4 col-sm-6">--}}
{{--                            <div class="single-topic text-center mb-30">--}}
{{--                                <div class="topic-img">--}}
{{--                                    <img src="assets/img/gallery/topic7.png" alt="">--}}
{{--                                    <div class="topic-content-box">--}}
{{--                                        <div class="topic-content">--}}
{{--                                            <h3><a href="#">Programing</a></h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-4 col-sm-6">--}}
{{--                            <div class="single-topic text-center mb-30">--}}
{{--                                <div class="topic-img">--}}
{{--                                    <img src="assets/img/gallery/topic8.png" alt="">--}}
{{--                                    <div class="topic-content-box">--}}
{{--                                        <div class="topic-content">--}}
{{--                                            <h3><a href="#">Programing</a></h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="col-xl-12">--}}
{{--                            <div class="section-tittle text-center mt-20">--}}
{{--                                <a href="courses.html" class="border-btn">View More Subjects</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- top subjects End -->--}}
            <!--? About Area-3 Start -->
            <section class="about-area3 fix">
                <div class="support-wrapper align-items-center">
                    <div class="right-content3">
                        <!-- img -->
                        <div class="right-img">
                            <img src="assets/img/gallery/about3.png" alt="">
                        </div>
                    </div>
                    <div class="left-content3">
                        <!-- section tittle -->
                        <div class="section-tittle section-tittle2 mb-20">
                            <div class="front-text">
                                <h2 class="">Voters need to know !</h2>
                            </div>
                        </div>
                        <div class="single-features">
                            <div class="features-icon">
                                <img src="assets/img/icon/right-icon.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <p>Voter has to be a Student of this organization.</p>
                            </div>
                        </div>
                        <div class="single-features">
                            <div class="features-icon">
                                <img src="assets/img/icon/right-icon.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <p>A Candidate can request for election to participate.</p>
                            </div>
                        </div>
                        <div class="single-features">
                            <div class="features-icon">
                                <img src="assets/img/icon/right-icon.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <p>Candidate Can also vote for a particular election.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Area End -->
            <!--? Team -->
            <section class="team-area section-padding40 fix">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="section-tittle text-center mb-55">
                                <h2>Community experts</h2>
                            </div>
                        </div>
                    </div>
                    <div class="team-active">
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img src="assets/img/gallery/team1.png" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">Mr. Urela</a></h5>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img src="assets/img/gallery/team2.png" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">Mr. Uttom</a></h5>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img src="assets/img/gallery/team3.png" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">Mr. Shakil</a></h5>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img src="assets/img/gallery/team4.png" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">Mr. Arafat</a></h5>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img src="assets/img/gallery/team3.png" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">Mr. saiful</a></h5>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services End -->
            <!--? About Area-2 Start -->
{{--            <section class="about-area2 fix pb-padding">--}}
{{--                <div class="support-wrapper align-items-center">--}}
{{--                    <div class="right-content2">--}}
{{--                        <!-- img -->--}}
{{--                        <div class="right-img">--}}
{{--                            <img src="assets/img/gallery/about2.png" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="left-content2">--}}
{{--                        <!-- section tittle -->--}}
{{--                        <div class="section-tittle section-tittle2 mb-20">--}}
{{--                            <div class="front-text">--}}
{{--                                <h2 class="">Take the next step--}}
{{--                                    toward your personal--}}
{{--                                    and professional goals--}}
{{--                                    with us.</h2>--}}
{{--                                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>--}}
{{--                                <a href="#" class="btn">Join now for Free</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
            <!-- About Area End -->
        </main>
        <!-- Scroll Up -->
        <div id="back-top" >
            <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
        </div>
        <script type="text/javascript">
        </script>
    @endsection
