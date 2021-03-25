@extends('frontend.layouts.app')
@section('content')
    <!-- Featured properties start -->
    <div class="featured-properties content-area-2 bg-white">
        <div class="container">
            <div class="main-title">
                <h1>Featured Properties</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="col-lg-12">
                <div class="row property-box-6">
                    <div class="col-lg-6 col-pad">
                        <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide">
                            <!-- main slider carousel items -->
                            <div class="carousel-inner">
                                <div class="active item carousel-item" data-slide-number="0">
                                    <img src="/frontend-assets/img/property/img-5.jpg" class="img-fluid" alt="property-4">
                                </div>
                                <div class="item carousel-item" data-slide-number="1">
                                    <img src="/frontend-assets/img/property/img-1.jpg" class="img-fluid" alt="property-6">
                                </div>
                                <div class="item carousel-item" data-slide-number="2">
                                    <img src="/frontend-assets/img/property/img-2.jpg" class="img-fluid" alt="property-1">
                                </div>
                                <div class="item carousel-item" data-slide-number="4">
                                    <img src="/frontend-assets/img/property/img-3.jpg" class="img-fluid" alt="property-5">
                                </div>
                                <div class="item carousel-item" data-slide-number="5">
                                    <img src="/frontend-assets/img/property/img-4.jpg" class="img-fluid" alt="property-8">
                                </div>
                                <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i
                                        class="fa fa-angle-left"></i></a>
                                <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-pad align-self-center">
                        <div class="info">
                            <h3>
                                <a href="properties-details.html">Find Your Dream House</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam.
                                Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros.</p>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <ul>
                                        <li><i class="flaticon-bed"></i> 3 Bedrooms</li>
                                        <li><i class="flaticon-bath"></i> 2 Bathrooms</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <ul>
                                        <li><i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq
                                            Ft:3400</li>
                                        <li><i class="flaticon-car-repair"></i> 1 Garage</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <ul>
                                        <li><i class="flaticon-balcony-and-door"></i>1 Balcony</li>
                                        <li><i class="flaticon-monitor"></i>TV</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="properties-details-3.html" class="btn btn-sm btn-color">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured properties end -->

    <!-- services start -->
    <div class="services content-area-20">
        <div class="container">
            <div class="main-title">
                <h1>What Are you Looking For?</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 wow fadeInLeft delay-04s">
                    <div class="media services-info">
                        <i class="flaticon-user"></i>
                        <div class="media-body">
                            <h5>Personalized Service</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s when an unknown</p>
                            <h4>01</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 wow fadeInUp delay-04s">
                    <div class="media services-info">
                        <i class="flaticon-hotel-building"></i>
                        <div class="media-body">
                            <h5>Luxury Real Estate Experts</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s when an unknown</p>
                            <h4>02</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 wow fadeInRight delay-04s">
                    <div class="media services-info">
                        <i class="flaticon-money-bag-with-dollar-symbol"></i>
                        <div class="media-body">
                            <h5>Xero Building For Rent $ Sell</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the</p>
                            <h4>03</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <a data-animation="animated fadeInUp delay-10s" href="#" class="btn btn-lg btn-theme">More Details</a>
                </div>
            </div>
        </div>
    </div>
    <!-- services end -->

    <!-- Counters start -->
    <div class="counters">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInUp delay-04s">
                    <div class="counter-box">
                        <i class="flaticon-tag"></i>
                        <h1 class="counter">500</h1>
                        <h5>Lines of Sale</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInDown delay-04s">
                    <div class="counter-box">
                        <i class="flaticon-badge"></i>
                        <h1 class="counter">254</h1>
                        <h5>Listings For Rent</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInUp delay-04s">
                    <div class="counter-box">
                        <i class="flaticon-call-center-agent"></i>
                        <h1 class="counter">510</h1>
                        <h5>Agents</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInDown delay-04s">
                    <div class="counter-box">
                        <i class="flaticon-job"></i>
                        <h1 class="counter">94</h1>
                        <h5>Brokers</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counters end -->

    <!-- Recent Properties start -->
    <div class="recent-properties content-area-2">
        <div class="container">
            <div class="main-title">
                <h1>Recent Properties</h1>
                <p>Properti yang baru saja dirilis</p>
            </div>
            <div class="row">
                @forelse ($recent as $recent)
                    <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInLeft delay-04s">
                        <div class="property-box-2">
                            <div class="property-thumbnail">
                                <a href="{{ route('frontend.property.show', $recent->id) }}" class="property-img">
                                    {{-- <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div> --}}
                                    <div class="tag-for">For {{ ucfirst($recent->type) }}</div>
                                    <img src="/frontend-assets/img/property/img-7.jpg" alt="property-2" class="img-fluid">
                                    <div class="info">
                                        <ul class="facilities-list clearfix">
                                            <li>
                                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                                <p>{{ $recent->square_meter }} m<sup>2</sup></p>
                                            </li>
                                            @forelse ($recent->facs as $fac)
                                                @if ($fac->name == 'bedroom')
                                                    <li>
                                                        <i class="flaticon-bed"></i>
                                                        <p>{{ $fac->value }} Kamar tidur</p>
                                                    </li>
                                                @endif
                                                @if ($fac->name == 'bathroom')
                                                    <li>
                                                        <i class="flaticon-bath"></i>
                                                        <p>{{ $fac->value }} kamar mandi</p>
                                                    </li>
                                                @endif
                                            @empty

                                            @endforelse
                                        </ul>
                                    </div>
                                </a>
                                <div class="property-overlay">
                                    <a href="properties-details.html" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a class="overlay-link property-video" title="Test Title">
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                    <div class="property-magnify-gallery">
                                        <a href="/frontend-assets/img/property/img-7.jpg" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="/frontend-assets/img/property/img-8.jpg" class="hidden"></a>
                                        <a href="/frontend-assets/img/property/img-9.jpg" class="hidden"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h5 class="title"><a href="properties-details.html">{{ $recent->title }}</a></h5>
                                <h4 class="price">
                                    {{ rupiah($recent->price) }}
                                </h4>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>Belum ada properti !</h1>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Recent Properties end -->

    <!-- Most popular places start -->
    <div class="most-popular-places content-area-3">
        <div class="container">
            <div class="main-title">
                <h1>Most Popular Places</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-pad wow fadeInLeft delay-04s">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-12 cp-2">
                                <div class="overview overview-box">
                                    <img src="/frontend-assets/img/popular-places/img-2.jpg" alt="popular-places">
                                    <div class="mask align-self-center">
                                        <div class="info">
                                            <div class="ds">
                                                <h2>Rome</h2>
                                                <div class="clearfix"></div>
                                                <p>14 Properties</p>
                                                <div class="clearfix"></div>
                                                <a href="properties-details.html" class="btn btn-border">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12 cp-2">
                                <div class="overview overview-box">
                                    <img src="/frontend-assets/img/popular-places/img-4.jpg" alt="popular-places">
                                    <div class="mask">
                                        <div class="info">
                                            <div class="ds">
                                                <h2>California</h2>
                                                <p>201 Properties</p>
                                                <a href="properties-details.html" class="btn btn-border">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-pad cp-3 wow fadeInUp delay-04s d-none-992">
                        <div class="overview aa overview-box">
                            <img src="/frontend-assets/img/popular-places/img-3.jpg" alt="popular-places" class="big-img">
                            <div class="mask">
                                <div class="info-2">
                                    <div class="ds">
                                        <h2>Tokyo</h2>
                                        <p>72 Properties</p>
                                        <a href="properties-details.html" class="btn btn-border">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-pad wow fadeInRight delay-04s">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-12 cp-2">
                                <div class="overview overview-box">
                                    <img src="/frontend-assets/img/popular-places/img-6.jpg" alt="popular-places">
                                    <div class="mask">
                                        <div class="info">
                                            <div class="ds">
                                                <h2>Paris</h2>
                                                <p>14 Properties</p>
                                                <a href="properties-details.html" class="btn btn-border">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12 cp-2">
                                <div class="overview overview-box">
                                    <img src="/frontend-assets/img/popular-places/img-5.jpg" alt="popular-places">
                                    <div class="mask">
                                        <div class="info">
                                            <div class="ds">
                                                <h2>London</h2>
                                                <p>201 Properties</p>
                                                <a href="properties-details.html" class="btn btn-border">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Most popular places end -->

    <!-- Agent start -->
    <div class="agent content-area">
        <div class="container">
            <div class="main-title">
                <h1>Meet Our Agents</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="slick-slider-area">
                <div class="row slick-carousel wow fadeInUp delay-04s"
                    data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <div class="slick-slide-item">
                        <div class="agent-3">
                            <div class="agent-photo">
                                <img src="/frontend-assets/img/avatar/avatar-5.jpg" alt="avatar-3" class="img-fluid">
                                <div class="job">
                                    <h6>Web Developer</h6>
                                </div>
                            </div>
                            <div class="agent-details">
                                <h5><a href="agent-detail.html">Martin Smith</a></h5>
                                <div class="contact">
                                    <p>
                                        <a href="mailto:info@themevessel.com"><i
                                                class="fa fa-envelope-o"></i>info@themevessel.com</a>
                                    </p>
                                    <p>
                                        <a href="tel:+554XX-634-7071"> <i class="fa fa-phone"></i>+55 4XX-634-7071</a>
                                    </p>
                                    <p>
                                        <a href="#"><i class="fa fa-skype"></i>sales.carshop</a>
                                    </p>
                                </div>
                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="agent-3">
                            <div class="agent-photo">
                                <img src="/frontend-assets/img/avatar/avatar-7.jpg" alt="agent-3" class="img-fluid">
                                <div class="job">
                                    <h6>Office Manager</h6>
                                </div>
                            </div>
                            <div class="agent-details">
                                <h5><a href="agent-detail.html">Brandon Miller</a></h5>
                                <div class="contact">
                                    <p>
                                        <a href="mailto:info@themevessel.com"><i
                                                class="fa fa-envelope-o"></i>info@themevessel.com</a>
                                    </p>
                                    <p>
                                        <a href="tel:+554XX-634-7071"> <i class="fa fa-phone"></i>+55 4XX-634-7071</a>
                                    </p>
                                    <p>
                                        <a href="#"><i class="fa fa-skype"></i>sales.carshop</a>
                                    </p>
                                </div>
                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="agent-3">
                            <div class="agent-photo">
                                <img src="/frontend-assets/img/avatar/avatar-6.jpg" alt="agent-3" class="img-fluid">
                                <div class="job">
                                    <h6>Office Manager</h6>
                                </div>
                            </div>
                            <div class="agent-details">
                                <h5><a href="agent-detail.html">Brandon Miller</a></h5>
                                <div class="contact">
                                    <p>
                                        <a href="mailto:info@themevessel.com"><i
                                                class="fa fa-envelope-o"></i>info@themevessel.com</a>
                                    </p>
                                    <p>
                                        <a href="tel:+554XX-634-7071"> <i class="fa fa-phone"></i>+55 4XX-634-7071</a>
                                    </p>
                                    <p>
                                        <a href="#"><i class="fa fa-skype"></i>sales.carshop</a>
                                    </p>
                                </div>
                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="agent-3">
                            <div class="agent-photo">
                                <img src="/frontend-assets/img/avatar/avatar-8.jpg" alt="agent-3" class="img-fluid">
                                <div class="job">
                                    <h6>Creative Director</h6>
                                </div>
                            </div>
                            <div class="agent-details">
                                <h5><a href="agent-detail.html">John Pitarshon</a></h5>
                                <div class="contact">
                                    <p>
                                        <a href="mailto:info@themevessel.com"><i
                                                class="fa fa-envelope-o"></i>info@themevessel.com</a>
                                    </p>
                                    <p>
                                        <a href="tel:+554XX-634-7071"> <i class="fa fa-phone"></i>+55 4XX-634-7071</a>
                                    </p>
                                    <p>
                                        <a href="#"><i class="fa fa-skype"></i>sales.carshop</a>
                                    </p>
                                </div>
                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Agent end -->

    <!-- Testimonial 2 start -->
    <div class="testimonial-2">
        <div class="container">
            <div class="row">
                <div class="offset-lg-2 col-lg-8">
                    <div class="testimonial-inner">
                        <div class="main-title text-center">
                            <h1>Our Testimonial</h1>
                        </div>
                        <div id="carouselExampleIndicators7" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner wow fadeInUp delay-04s">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <div class="avatar">
                                                <img src="/frontend-assets/img/avatar/avatar-2.jpg" alt="avatar-2"
                                                    class="img-fluid rounded">
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <p class="lead">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                                pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.
                                                Nulla posuere sapien vitae.
                                            </p>
                                            <div class="author-name">
                                                Emma Connor
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-half-full"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <div class="avatar">
                                                <img src="/frontend-assets/img/avatar/avatar.jpg" alt="avatar"
                                                    class="img-fluid rounded">
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <p class="lead">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                                pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.
                                                Nulla posuere sapien vitae.
                                            </p>
                                            <div class="author-name">
                                                Martin Smith
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-half-full"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <div class="avatar">
                                                <img src="/frontend-assets/img/avatar/avatar-3.jpg" alt="avatar-3"
                                                    class="img-fluid rounded">
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <p class="lead">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                                pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.
                                                Nulla posuere sapien vitae.
                                            </p>
                                            <div class="author-name">
                                                John Antony
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-half-full"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators7" role="button"
                                data-slide="prev">
                                <span class="slider-mover-left" aria-hidden="true">
                                    <i class="fa fa-angle-left"></i>
                                </span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators7" role="button"
                                data-slide="next">
                                <span class="slider-mover-right" aria-hidden="true">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial 2 end -->

    <!-- Blog start -->
    <div class="blog content-area-2">
        <div class="container">
            <div class="main-title">
                <h1>Latest Blog</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="slick-slider-area">
                <div class="row slick-carousel wow fadeInUp delay-04s"
                    data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <div class="slick-slide-item">
                        <div class="blog-1">
                            <div class="blog-photo">
                                <img src="/frontend-assets/img/blog/blog-3.jpg" alt="blog" class="img-fluid">
                                <div class="user">
                                    <div class="avatar">
                                        <img src="/frontend-assets/img/avatar/avatar-2.jpg" alt="avatar"
                                            class="img-fluid rounded-circle">
                                    </div>
                                    <div class="name">
                                        <h5>Brandon Miller</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Why Live in New York</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar...</p>
                                <div class="blog-footer clearfix">
                                    <div class="float-left">
                                        <p class="date"><i class="flaticon-calendar"></i> 17 Feb, 2020</p>
                                    </div>
                                    <div class="float-right">
                                        <a href="#">Read more..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="blog-1">
                            <div class="blog-photo">
                                <img src="/frontend-assets/img/blog/blog-2.jpg" alt="blog" class="img-fluid">
                                <div class="user">
                                    <div class="avatar">
                                        <img src="/frontend-assets/img/avatar/avatar.jpg" alt="avatar"
                                            class="img-fluid rounded-circle">
                                    </div>
                                    <div class="name">
                                        <h5>John Doe</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Buying a Home</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar...</p>
                                <div class="blog-footer clearfix">
                                    <div class="float-left">
                                        <p class="date"><i class="flaticon-calendar"></i> 24 Sep, 2019</p>
                                    </div>
                                    <div class="float-right">
                                        <a href="#">Read more..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="blog-1">
                            <div class="blog-photo">
                                <img src="/frontend-assets/img/blog/blog-3.jpg" alt="blog" class="img-fluid">
                                <div class="user">
                                    <div class="avatar">
                                        <img src="/frontend-assets/img/avatar/avatar-2.jpg" alt="avatar"
                                            class="img-fluid rounded-circle">
                                    </div>
                                    <div class="name">
                                        <h5>Brandon Miller</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Why Live in New York</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar...</p>
                                <div class="blog-footer clearfix">
                                    <div class="float-left">
                                        <p class="date"><i class="flaticon-calendar"></i> 17 Feb, 2020</p>
                                    </div>
                                    <div class="float-right">
                                        <a href="#">Read more..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="blog-1">
                            <div class="blog-photo">
                                <img src="/frontend-assets/img/blog/blog.jpg" alt="blog-1" class="img-fluid">
                                <div class="user">
                                    <div class="avatar">
                                        <img src="/frontend-assets/img/avatar/avatar-3.jpg" alt="avatar"
                                            class="img-fluid rounded-circle">
                                    </div>
                                    <div class="name">
                                        <h5>Teseira</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Selling Your Home</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar...</p>
                                <div class="blog-footer clearfix">
                                    <div class="float-left">
                                        <p class="date"><i class="flaticon-calendar"></i> 17 Feb, 2020</p>
                                    </div>
                                    <div class="float-right">
                                        <a href="#">Read more..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog end -->

    <!-- intro section start -->
    <div class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="intro-text">
                        <a href="index-2.html" class="logos"><img src="/frontend-assets/img/logos/logo-white.png"
                                alt="logo"></a>
                        <a href="index-2.html" class="d-none-768"><img src="/frontend-assets/img/logos/logo-white.png"
                                alt="logo"></a>
                        <span>Looking To Sell Or Rent Your Property?</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <a href="#" class="btn btn-md sn">Submit Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- intro section end -->
@endsection
