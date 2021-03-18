@extends('frontend.layouts.app')

@section('body')
<!-- Banner start -->
<div class="banner" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active item-bg">
                <img class="d-block w-100 h-100" src="/frontend-assets/img/banner/img-5.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container b1-inner">
                        <div class="tab-search-section">
                            <h1>Find Your Dream Properties</h1>
                            <div id="typed-strings">
                                <p>Find new & featured property located in your local city.</p>
                            </div>
                            <h1 class="typed-text tt2">&nbsp;
                                <span id="typed"></span>
                            </h1>
                            <div class="tab-box">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Buy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Rent</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="search-area search-area-6">
                                            <div class="search-area-inner">
                                                <div class="search-contents">
                                                    <form method="GET">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                                                <div class="form-group">
                                                                    <input type="text" name="name" class="search-fields sf2 fc2" placeholder="Enter Keyword">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                                                <div class="form-group">
                                                                    <select class="selectpicker search-fields" name="type">
                                                                        <option>Property Types</option>
                                                                        <option>Residential</option>
                                                                        <option>Commercial</option>
                                                                        <option>Land</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                                                <div class="form-group">
                                                                    <select class="selectpicker search-fields" name="location">
                                                                        <option>Location</option>
                                                                        <option>United Kingdom</option>
                                                                        <option>American Samoa</option>
                                                                        <option>Belgium</option>
                                                                        <option>Canada</option>
                                                                        <option>Delaware</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                                                <div class="form-group">
                                                                    <select class="selectpicker search-fields" name="make">
                                                                        <option>Room</option>
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2 cp3">
                                                                <div class="form-group fg2">
                                                                    <button class="search-button btn-md btn-color">Search</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="search-area search-area-6">
                                            <div class="search-area-inner">
                                                <div class="search-contents">
                                                    <form method="GET">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                                                <div class="form-group">
                                                                    <input type="text" name="name" class="search-fields sf2 fc2" placeholder="Enter Keyword">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                                                <div class="form-group">
                                                                    <select class="selectpicker search-fields" name="type">
                                                                        <option>Property Types</option>
                                                                        <option>Residential</option>
                                                                        <option>Commercial</option>
                                                                        <option>Land</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                                                <div class="form-group">
                                                                    <select class="selectpicker search-fields" name="location">
                                                                        <option>Location</option>
                                                                        <option>United Kingdom</option>
                                                                        <option>American Samoa</option>
                                                                        <option>Belgium</option>
                                                                        <option>Canada</option>
                                                                        <option>Delaware</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                                                <div class="form-group">
                                                                    <select class="selectpicker search-fields" name="make">
                                                                        <option>Room</option>
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2 cp3">
                                                                <div class="form-group fg2">
                                                                    <button class="search-button btn-md btn-color">Search</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
    </div>
</div>
<!-- banner end -->

<!-- Featured properties start -->
<div class="featured-properties content-area-7">
    <div class="container-fluid">
        <div class="main-title">
            <h1>Featured Properties</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="row slick-fullwidth wow fadeInUp delay-04s">
            <div class="slick-slide-item">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="properties-details.html" class="property-img">
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <div class="tag-for">For Sale</div>
                            <div class="plan-price"><sup>$</sup>650<span>/month</span> </div>
                            <img src="/frontend-assets/img/property/img-4.jpg" alt="property-box" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.html" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <a class="overlay-link property-video" title="Test Title">
                                <i class="fa fa-video-camera"></i>
                            </a>
                            <div class="property-magnify-gallery">
                                <a href="/frontend-assets/img/property/img-4.jpg" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="/frontend-assets/img/property/img-6.jpg" class="hidden"></a>
                                <a href="/frontend-assets/img/property/img-2.jpg" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="properties-details.html">Real Luxury Villa</a>
                        </h1>
                        <div class="location">
                            <a href="properties-details.html">
                                <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-bed"></i> 3 Bedrooms
                            </li>
                            <li>
                                <i class="flaticon-bath"></i> 2 Bathrooms
                            </li>
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft:3400
                            </li>
                            <li>
                                <i class="flaticon-car-repair"></i> 1 Garage
                            </li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a href="#">
                            <i class="fa fa-user"></i> Jhon Doe
                        </a>
                        <span>
                            <i class="fa fa-calendar-o"></i> 2 years ago
                        </span>
                    </div>
                </div>
            </div>
            <div class="slick-slide-item">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="properties-details.html" class="property-img">
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <div class="tag-for">For Sale</div>
                            <div class="plan-price"><sup>$</sup>650<span>/month</span> </div>
                            <img src="/frontend-assets/img/property/img-5.jpg" alt="property-box" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.html" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <a class="overlay-link property-video" title="Test Title">
                                <i class="fa fa-video-camera"></i>
                            </a>
                            <div class="property-magnify-gallery">
                                <a href="/frontend-assets/img/property/img-5.jpg" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="/frontend-assets/img/property/img-6.jpg" class="hidden"></a>
                                <a href="/frontend-assets/img/property/img-2.jpg" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="properties-details.html">Masons Villas</a>
                        </h1>
                        <div class="location">
                            <a href="properties-details.html">
                                <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-bed"></i> 3 Bedrooms
                            </li>
                            <li>
                                <i class="flaticon-bath"></i> 2 Bathrooms
                            </li>
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft:3400
                            </li>
                            <li>
                                <i class="flaticon-car-repair"></i> 1 Garage
                            </li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a href="#">
                            <i class="fa fa-user"></i> Jhon Doe
                        </a>
                        <span>
                            <i class="fa fa-calendar-o"></i> 2 years ago
                        </span>
                    </div>
                </div>
            </div>
            <div class="slick-slide-item">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="properties-details.html" class="property-img">
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <div class="tag-for">For Rent</div>
                            <div class="plan-price"><sup>$</sup>650<span>/month</span> </div>
                            <img src="/frontend-assets/img/property/img-6.jpg" alt="property-box" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.html" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <a class="overlay-link property-video" title="Test Title">
                                <i class="fa fa-video-camera"></i>
                            </a>
                            <div class="property-magnify-gallery">
                                <a href="/frontend-assets/img/property/img-2.jpg" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="/frontend-assets/img/property/img-6.jpg" class="hidden"></a>
                                <a href="/frontend-assets/img/property/img-1.jpg" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="properties-details.html">Sweet Family Home</a>
                        </h1>
                        <div class="location">
                            <a href="properties-details.html">
                                <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-bed"></i> 3 Bedrooms
                            </li>
                            <li>
                                <i class="flaticon-bath"></i> 2 Bathrooms
                            </li>
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft:3400
                            </li>
                            <li>
                                <i class="flaticon-car-repair"></i> 1 Garage
                            </li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a href="#">
                            <i class="fa fa-user"></i> Jhon Doe
                        </a>
                        <span>
                            <i class="fa fa-calendar-o"></i> 2 years ago
                        </span>
                    </div>
                </div>
            </div>
            <div class="slick-slide-item">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="properties-details.html" class="property-img">
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <div class="tag-for">For Sale</div>
                            <div class="plan-price"><sup>$</sup>820<span>/month</span> </div>
                            <img src="/frontend-assets/img/property/img-1.jpg" alt="property-box" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.html" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <a class="overlay-link property-video" title="Test Title">
                                <i class="fa fa-video-camera"></i>
                            </a>
                            <div class="property-magnify-gallery">
                                <a href="/frontend-assets/img/property/img-1.jpg" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="/frontend-assets/img/property/img-6.jpg" class="hidden"></a>
                                <a href="/frontend-assets/img/property/img-2.jpg" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="properties-details.html">Relaxing Apartment</a>
                        </h1>
                        <div class="location">
                            <a href="properties-details.html">
                                <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-bed"></i> 3 Bedrooms
                            </li>
                            <li>
                                <i class="flaticon-bath"></i> 2 Bathrooms
                            </li>
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft:3400
                            </li>
                            <li>
                                <i class="flaticon-car-repair"></i> 1 Garage
                            </li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a href="#">
                            <i class="fa fa-user"></i>
                        </a>
                        <span>
                            <i class="fa fa-calendar-o"></i> 2 day ago
                        </span>
                    </div>
                </div>
            </div>
            <div class="slick-slide-item">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="properties-details.html" class="property-img">
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <div class="tag-for">For Rent</div>
                            <div class="plan-price"><sup>$</sup>480<span>/month</span> </div>
                            <img src="/frontend-assets/img/property/img-2.jpg" alt="property-box" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.html" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <a class="overlay-link property-video" title="Test Title">
                                <i class="fa fa-video-camera"></i>
                            </a>
                            <div class="property-magnify-gallery">
                                <a href="/frontend-assets/img/property/img-2.jpg" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="/frontend-assets/img/property/img-6.jpg" class="hidden"></a>
                                <a href="/frontend-assets/img/property/img-1.jpg" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="properties-details.html">Beautiful Single Home</a>
                        </h1>
                        <div class="location">
                            <a href="properties-details.html">
                                <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-bed"></i> 3 Bedrooms
                            </li>
                            <li>
                                <i class="flaticon-bath"></i> 2 Bathrooms
                            </li>
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft:3400
                            </li>
                            <li>
                                <i class="flaticon-car-repair"></i> 1 Garage
                            </li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a href="#">
                            <i class="fa fa-user"></i> Jhon Doe
                        </a>
                        <span>
                            <i class="fa fa-calendar-o"></i> 2 years ago
                        </span>
                    </div>
                </div>
            </div>
            <div class="slick-slide-item">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="properties-details.html" class="property-img">
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <div class="tag-for">For Sale</div>
                            <div class="plan-price"><sup>$</sup>640<span>/month</span> </div>
                            <img src="/frontend-assets/img/property/img-3.jpg" alt="property-box" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.html" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <a class="overlay-link property-video" title="Test Title">
                                <i class="fa fa-video-camera"></i>
                            </a>
                            <div class="property-magnify-gallery">
                                <a href="/frontend-assets/img/property/img-2.jpg" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="/frontend-assets/img/property/img-6.jpg" class="hidden"></a>
                                <a href="/frontend-assets/img/property/img-2.jpg" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="properties-details.html">Modern Family Home</a>
                        </h1>
                        <div class="location">
                            <a href="properties-details.html">
                                <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-bed"></i> 3 Bedrooms
                            </li>
                            <li>
                                <i class="flaticon-bath"></i> 2 Bathrooms
                            </li>
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft:3400
                            </li>
                            <li>
                                <i class="flaticon-car-repair"></i> 1 Garage
                            </li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a href="#">
                            <i class="fa fa-user"></i> Jhon Doe
                        </a>
                        <span>
                            <i class="fa fa-calendar-o"></i> 2 years ago
                        </span>
                    </div>
                </div>
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<!-- Featured properties end -->

<!-- services 3 start -->
<div class="services-3 content-area-20 bg-white">
    <div class="container">
        <div class="main-title">
            <h1>What Are you Looking For?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInLeft delay-04s">
                <div class="services-info-3">
                    <i class="flaticon-hotel-building"></i>
                    <h5>Apartments Clean</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    <a href="services.html" class="read-more">Read more...</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp delay-04s">
                <div class="services-info-3">
                    <i class="flaticon-house"></i>
                    <h5>Houses</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    <a href="services.html" class="read-more">Read more...</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInDown delay-04s">
                <div class="services-info-3">
                    <i class="flaticon-call-center-agent"></i>
                    <h5>Support 24/7</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    <a href="services.html" class="read-more">Read more...</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInRight delay-04s">
                <div class="services-info-3">
                    <i class="flaticon-office-block"></i>
                    <h5>Commercial</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    <a href="services.html" class="read-more">Read more...</a>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <a data-animation="animated fadeInUp delay-10s" href="#" class="btn btn-lg btn-theme">More Details</a>
            </div>
        </div>
    </div>
</div>
<!-- services 3 end -->

<!-- Recent Properties start -->
<div class="recent-properties content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>Recent Properties</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInLeft delay-04s">
                <div class="property-box-8">
                    <div class="property-photo">
                        <img src="/frontend-assets/img/property/img-12.jpg" alt="property-8" class="img-fluid">
                        <div class="tag-for">For Rent</div>
                        <div class="price-ratings-box">
                            <p class="price">
                                $178,000
                            </p>
                            <div class="ratings">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="heading">
                            <h3>
                                <a href="properties-details.html">Real Luxury Villa</a>
                            </h3>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                        </div>
                        <div class="properties-listing">
                            <span>3 Beds</span>
                            <span>2 Baths</span>
                            <span>980 sqft</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp delay-04s">
                <div class="property-box-8">
                    <div class="property-photo">
                        <img src="/frontend-assets/img/property/img-13.jpg" alt="property-8" class="img-fluid">
                        <div class="tag-for">For Rent</div>
                        <div class="price-ratings-box">
                            <p class="price">
                                $178,000
                            </p>
                            <div class="ratings">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="heading">
                            <h3>
                                <a href="properties-details.html">Masons Villas</a>
                            </h3>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                        </div>
                        <div class="properties-listing">
                            <span>3 Beds</span>
                            <span>2 Baths</span>
                            <span>980 sqft</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp delay-04s">
                <div class="property-box-8">
                    <div class="property-photo">
                        <img src="/frontend-assets/img/property/img-14.jpg" alt="property-8" class="img-fluid">
                        <div class="tag-for">For Sale</div>
                        <div class="price-ratings-box">
                            <p class="price">
                                $178,000
                            </p>
                            <div class="ratings">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="heading">
                            <h3>
                                <a href="properties-details.html">Luxury Villa</a>
                            </h3>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                        </div>
                        <div class="properties-listing">
                            <span>3 Beds</span>
                            <span>2 Baths</span>
                            <span>980 sqft</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInRight delay-04s">
                <div class="property-box-8">
                    <div class="property-photo">
                        <img src="/frontend-assets/img/property/img-15.jpg" alt="property-8" class="img-fluid">
                        <div class="tag-for">For Rent</div>
                        <div class="price-ratings-box">
                            <p class="price">
                                $178,000
                            </p>
                            <div class="ratings">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="heading">
                            <h3>
                                <a href="properties-details.html">Park avenue</a>
                            </h3>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                        </div>
                        <div class="properties-listing">
                            <span>3 Beds</span>
                            <span>2 Baths</span>
                            <span>980 sqft</span>
                        </div>
                    </div>
                </div>
            </div>
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
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInLeft delay-04s">
                <div class="agent-2">
                    <div class="agent-photo">
                        <img src="/frontend-assets/img/avatar/avatar-6.jpg" alt="agent-grid-2" class="img-fluid">
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="agent-details">
                        <h5><a href="agent-detail.html">John Pitarshon</a></h5>
                        <p>Creative Director</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInLeft delay-04s">
                <div class="agent-2">
                    <div class="agent-photo">
                        <img src="/frontend-assets/img/avatar/avatar-5.jpg" alt="agent-grid-2" class="img-fluid">
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="agent-details">
                        <h5><a href="agent-detail.html">Martin Smith</a></h5>
                        <p>Web Developer</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInRight delay-04s">
                <div class="agent-2">
                    <div class="agent-photo">
                        <img src="/frontend-assets/img/avatar/avatar-7.jpg" alt="agent-grid-2" class="img-fluid">
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="agent-details">
                        <h5><a href="agent-detail.html">Brandon Miller</a></h5>
                        <p>Office Manager</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInRight delay-04s">
                <div class="agent-2">
                    <div class="agent-photo">
                        <img src="/frontend-assets/img/avatar/avatar-8.jpg" alt="agent-grid-2" class="img-fluid">
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="agent-details">
                        <h5><a href="#">Karen Paran</a></h5>
                        <p>Support Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div >
<!-- Agent end -->

<!-- Testimonial 4 start -->
<div class="testimonial-4 tml-4 content-area-7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                    <h1>Our Testimonial</h1>
                </div>
            </div>
        </div>
        <div class="slick-slider-area">
            <div class="row slick-carousel wow fadeInUp delay-04s" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item wow">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="arrow-down"></div>
                        <div class="media user">
                            <a href="#">
                                <img src="/frontend-assets/img/avatar/avatar.jpg" alt="testimonial-4" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>Maria Blank</h5>
                                <h6>Web Developer</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item wow">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="arrow-down"></div>
                        <div class="media user">
                            <a href="#">
                                <img src="/frontend-assets/img/avatar/avatar-2.jpg" alt="testimonial-4" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>Karen Paran</h5>
                                <h6>Support Manager</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="arrow-down"></div>
                        <div class="media user">
                            <a href="#">
                                <img src="/frontend-assets/img/avatar/avatar-4.jpg" alt="testimonial-4" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    John Pitarshon
                                </h5>
                                <h6>Creative Director</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="arrow-down"></div>
                        <div class="media user">
                            <a href="#">
                                <img src="/frontend-assets/img/avatar/avatar-4.jpg" alt="testimonial-4" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    John Pitarshon
                                </h5>
                                <h6>Creative Director</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial 4 end -->

<!-- Blog start -->
<div class="blog content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>Latest Blog</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 wow fadeInLeft delay-04s">
                <div class="row blog-3">
                    <div class="col-lg-5 col-md-12 col-pad ">
                        <div class="photo">
                            <img src="/frontend-assets/img/blog/blog-6.jpg" alt="blog-3" class="img-fluid blog-img">
                            <div class="user">
                                <div class="avatar">
                                    <img src="/frontend-assets/img/avatar/avatar.jpg" alt="avatar" class="img-fluid rounded-circle">
                                </div>
                                <div class="name">
                                    <h5>Rx Vodro</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-pad">
                        <div class="detail clearfix">
                            <h3>
                                <a href="blog-single-sidebar-right.html">Buying a Home</a>
                            </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since<span class="d-none2-1200"> the 1500s, when an unknown printer took a galley of type and</span></p>
                            <div class="blog-footer clearfix">
                                <div class="float-left">
                                    <p class="date"><i class="flaticon-calendar"></i> 24 Sep, 2020</p>
                                </div>
                                <div class="float-right">
                                    <a href="#">Read more..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 wow fadeInRight delay-04s">
                <div class="row blog-3">
                    <div class="col-lg-5 col-md-12 col-pad ">
                        <div class="photo">
                            <img src="/frontend-assets/img/blog/blog-7.jpg" alt="blog-3" class="img-fluid blog-img">
                            <div class="user">
                                <div class="avatar">
                                    <img src="/frontend-assets/img/avatar/avatar-2.jpg" alt="avatar" class="img-fluid rounded-circle">
                                </div>
                                <div class="name">
                                    <h5>Teseira</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-pad">
                        <div class="detail clearfix">
                            <h3>
                                <a href="blog-single-sidebar-right.html">Selling Your Home</a>
                            </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since<span class="d-none2-1200"> the 1500s, when an unknown printer took a galley of type and</span></p>
                            <div class="blog-footer clearfix">
                                <div class="float-left">
                                    <p class="date"><i class="flaticon-calendar"></i> 24 Sep, 2020</p>
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
<!-- Blog start -->

<!-- Our newslatters start -->
<div class="our-newslatters">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Get Newsletter</h3>
                <p>Your download should start automatically, if not Click here. Should I give up, huh?.</p>
                <div class="form-info">
                    <form action="#" method="GET" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-12">
                                <div class="form-group email">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-color btn-md btn-message">Get it now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our newslatters end -->
@endsection