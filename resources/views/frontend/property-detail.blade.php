@extends('frontend.layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Property Detail</h1>
                <ul class="breadcrumbs">
                    <li><a href="index-2.html">Home</a></li>
                    <li class="active">Property Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub banner end -->

    <!-- Properties details page start -->
    <div class="properties-details-page content-area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-60">
                        <div class="heading-properties-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="informeson">
                                        <h1>{{ $single->title }}<span>{{ rupiah($single->price) }}</span></h1>
                                        <div>
                                            <div class="float-left">
                                                <ul class="clearfix">
                                                    @forelse ($single->facs as $fac)
                                                        @switch($fac->name)
                                                            @case('bathroom')
                                                                <li><i class="flaticon-bed"></i> {{ $fac->value }} Kamar Mandi</li>
                                                            @break
                                                            @case('bedroom')
                                                                <li><i class="flaticon-bed"></i> {{ $fac->value }} Kamar tidur</li>
                                                            @break
                                                            @case('garage')
                                                                <li><i class="flaticon-bed"></i> {{ $fac->value }} Garasi</li>
                                                            @break
                                                            @case('balcony')
                                                                <li><i class="flaticon-bed"></i> {{ $fac->value }} Balkon</li>
                                                            @break
                                                        @endswitch
                                                    @empty
                                                        <span><b>Belum ada fasilitas yang tersedia !</b></span>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            @forelse ($single->images as $key => $img)
                                <div class="{{ $key == 0 ? "active" : "" }} item carousel-item" data-slide-number="{{ $key }}">
                                    <img src="{{ asset('storage/upload/'.$img->file) }}" class="img-fluid" alt="properties-photo" style=""  >
                                </div>
                                {{-- <div class="item carousel-item" data-slide-number="{{ $key }}">
                                    <img src="assets/img/property/img-17.jpg" class="img-fluid" alt="properties-photo">
                                </div>
                                <div class="item carousel-item" data-slide-number="{{ $key }}">
                                    <img src="assets/img/property/img-18.jpg" class="img-fluid" alt="properties-photo">
                                </div>
                                <div class="item carousel-item" data-slide-number="{{ $key }}">
                                    <img src="assets/img/property/img-19.jpg" class="img-fluid" alt="properties-photo">
                                </div>
                                <div class="item carousel-item" data-slide-number="{{ $key }}">
                                    <img src="assets/img/property/img-20.jpg" class="img-fluid" alt="properties-photo">
                                </div> --}}
                                @empty
                            @endforelse

                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators sp-2 smail-properties list-inline nav nav-justified ">
                            @forelse ($single->images as $key => $img)
                                <li class="list-inline-item {{ $key == 0 ? "active" : "" }}">
                                    <a id="carousel-selector-{{$key}}" class="selected" data-slide-to="{{$key}}"
                                        data-target="#propertiesDetailsSlider">
                                        <img src="{{ asset('storage/upload/'.$img->file) }}" class="img-fluid"
                                            alt="properties-photo-smale" style="height:100px;">
                                    </a>
                                </li>
                            @empty
                            @endforelse
                            {{-- <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#propertiesDetailsSlider">
                                    <img src="assets/img/property/img-17.jpg" class="img-fluid"
                                        alt="properties-photo-smale">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#propertiesDetailsSlider">
                                    <img src="assets/img/property/img-18.jpg" class="img-fluid"
                                        alt="properties-photo-smale">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-4" data-slide-to="3" data-target="#propertiesDetailsSlider">
                                    <img src="assets/img/property/img-19.jpg" class="img-fluid"
                                        alt="properties-photo-smale">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-5" data-slide-to="4" data-target="#propertiesDetailsSlider">
                                    <img src="assets/img/property/img-20.jpg" class="img-fluid"
                                        alt="properties-photo-smale">
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 slider">
                    <!-- Search area start -->
                    <div class="widget-2 search-area advanced-search as-2">
                        <h5 class="sidebar-title">Advanced Search</h5>
                        <div class="search-area-inner">
                            <div class="search-contents ">
                                <form method="GET">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="area">
                                            <option>Area From</option>
                                            <option>1500</option>
                                            <option>1200</option>
                                            <option>900</option>
                                            <option>600</option>
                                            <option>300</option>
                                            <option>100</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="Status">
                                            <option>Property Status</option>
                                            <option>For Sale</option>
                                            <option>For Rent</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="Location">
                                            <option>Location</option>
                                            <option>United Kingdom</option>
                                            <option>American Samoa</option>
                                            <option>Belgium</option>
                                            <option>Canada</option>
                                            <option>Delaware</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="types">
                                            <option>Property Types</option>
                                            <option>Residential</option>
                                            <option>Commercial</option>
                                            <option>Land</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bedrooms">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-30">
                                        <select class="selectpicker search-fields" name="bedrooms">
                                            <option>Bathrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label>Area</label>
                                        <div class="range-slider">
                                            <div data-min="0" data-max="150000" data-unit="Sq ft" data-min-name="min_price"
                                                data-max-name="max_price" class="range-slider-ui ui-slider"
                                                aria-disabled="false"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label>Price</label>
                                        <div class="range-slider">
                                            <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price"
                                                data-max-name="max_price" class="range-slider-ui ui-slider"
                                                aria-disabled="false"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <button class="search-button btn-md btn-color">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Property description start -->
                    <div class="property-description mb-60">
                        <h3 class="heading-3">Deskripsi Properti</h3>
                        <p>
                            {{ $single->desc }}
                        </p>
                    </div>
                    <!-- Property details start -->
                    <div class="property-details mb-45">
                        <h3 class="heading-3">Property Details</h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li>
                                        <strong>Harga:</strong> {{ rupiah($single->price) }}
                                    </li>
                                    <li>
                                        <strong>Usia Bangunan:</strong> {{ $single->building_age }}
                                    </li>
                                    <li>
                                        <strong>Jenis Properti:</strong>{{ $single->category->name }}
                                    </li>
                                    <li>
                                        <strong>Kamar Tidur:</strong>{{ $single->facs->where('name', 'bedroom')->first()->value }}
                                    </li>
                                    <li>
                                        <strong>Kamar Mandi:</strong>{{ $single->facs->where('name', 'bathroom')->first()->value }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li>
                                        <strong>Tipe:</strong>{{ $single->type == 'sale' ? 'Dijual' : 'Disewakan'}}
                                    </li>
                                    <li>
                                        <strong>Kota:</strong>{{ $single->city->name }}
                                    </li>
                                    <li>
                                        <strong>Parking:</strong>Yes
                                    </li>
                                    <li>
                                        <strong>Property Owner:</strong>Sohel Rana
                                    </li>
                                    <li>
                                        <strong>Zip Code: </strong>{{ $single->postal_code }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Amenities box start -->
                    <div class="amenities-box af mb-45">
                        <h3 class="heading-3">Condition</h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-draw-check-mark"></i> 3 Bedrooms</span></li>
                                    <li><span><i class="flaticon-draw-check-mark"></i> 2 Bathroom</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-draw-check-mark"></i> 1 Garage</span></li>
                                    <li><span><i class="flaticon-draw-check-mark"></i> 1 Balcony</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-draw-check-mark"></i> 4800 sq ft</span></li>
                                    <li><span><i class="flaticon-draw-check-mark"></i> TV</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Features opions start -->
                    <div class="features-opions af mb-45">
                        <h3 class="heading-3">Features</h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Air conditioning
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Wifi
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Swimming Pool
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Double Bed
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Balcony
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Telephone
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Garage
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Parking
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        TV
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Home Theater
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Alarm
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Garage
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Gym
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Electric Range
                                    </li>
                                    <li>
                                        <i class="flaticon-draw-check-mark"></i>
                                        Private space
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                 
                  
                    <div class="section-location mb-60">
                        <h3 class="heading-3">Property Location</h3>
                        <div class="map">
                            <div id="contactMap" class="contact-map"></div>
                        </div>
                    </div>
                    <!-- Related properties start -->
                    <div class="related-properties hedin-mb-30">
                        <h3 class="heading-3">Related Properties</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="property-box-7">
                                    <div class="property-thumbnail">
                                        <a href="properties-details.html" class="property-img">
                                            <div class="tag-2">For Rent</div>
                                            <div class="price-box"><span>$850.00</span> Per night</div>
                                            <img src="assets/img/property/img-1.jpg" alt="property" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <h1 class="title">
                                            <a href="properties-details.html">Real Luxury Villa</a>
                                        </h1>
                                        <div class="location">
                                            <a href="properties-details.html">
                                                <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123
                                                Kathal St. Tampa City,
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <span>Area</span>3600 Sqft
                                        </li>
                                        <li>
                                            <span>Beds</span> 3
                                        </li>
                                        <li>
                                            <span>Baths</span> 2
                                        </li>
                                        <li>
                                            <span>Garage</span> 1
                                        </li>
                                    </ul>
                                    <div class="footer clearfix">
                                        <div class="pull-left days">
                                            <p><i class="fa fa-user"></i> Jhon Doe</p>
                                        </div>
                                        <ul class="pull-right">
                                            <li><a href="#"><i class="flaticon-heart-shape-outline"></i></a></li>
                                            <li><a href="#"><i class="flaticon-calendar"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="property-box-7">
                                    <div class="property-thumbnail">
                                        <a href="properties-details.html" class="property-img">
                                            <div class="tag-2">For Sale</div>
                                            <div class="price-box"><span>$850.00</span> Per night</div>
                                            <img src="assets/img/property/img-2.jpg" alt="property" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <h1 class="title">
                                            <a href="properties-details.html">Beautiful Single Home</a>
                                        </h1>
                                        <div class="location">
                                            <a href="properties-details.html">
                                                <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123
                                                Kathal St. Tampa City,
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <span>Area</span>3600 Sqft
                                        </li>
                                        <li>
                                            <span>Beds</span> 3
                                        </li>
                                        <li>
                                            <span>Baths</span> 2
                                        </li>
                                        <li>
                                            <span>Garage</span> 1
                                        </li>
                                    </ul>
                                    <div class="footer clearfix">
                                        <div class="pull-left days">
                                            <p><i class="fa fa-user"></i> Jhon Doe</p>
                                        </div>
                                        <ul class="pull-right">
                                            <li><a href="#"><i class="flaticon-heart-shape-outline"></i></a></li>
                                            <li><a href="#"><i class="flaticon-calendar"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar mbl">
                        <!-- Search area start -->
                        <div class="widget search-area advanced-search as">
                            <h5 class="sidebar-title">Advanced Search</h5>
                            <div class="search-area-inner">
                                <div class="search-contents ">
                                    <form method="GET">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="area">
                                                <option>Area From</option>
                                                <option>1500</option>
                                                <option>1200</option>
                                                <option>900</option>
                                                <option>600</option>
                                                <option>300</option>
                                                <option>100</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="Status">
                                                <option>Property Status</option>
                                                <option>For Sale</option>
                                                <option>For Rent</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="Location">
                                                <option>Location</option>
                                                <option>United Kingdom</option>
                                                <option>American Samoa</option>
                                                <option>Belgium</option>
                                                <option>Canada</option>
                                                <option>Delaware</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="types">
                                                <option>Property Types</option>
                                                <option>Residential</option>
                                                <option>Commercial</option>
                                                <option>Land</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="bedrooms">
                                                <option>Bedrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-30">
                                            <select class="selectpicker search-fields" name="bedrooms">
                                                <option>Bathrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label>Area</label>
                                            <div class="range-slider">
                                                <div data-min="0" data-max="150000" data-unit="Sq ft"
                                                    data-min-name="min_price" data-max-name="max_price"
                                                    class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label>Price</label>
                                            <div class="range-slider">
                                                <div data-min="0" data-max="150000" data-unit="USD"
                                                    data-min-name="min_price" data-max-name="max_price"
                                                    class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <button class="search-button btn-md btn-color">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Categories start -->
                        <div class="widget categories">
                            <h5 class="sidebar-title">Categories</h5>
                            <ul>
                                <li><a href="#">Apartments<span>(12)</span></a></li>
                                <li><a href="#">Houses<span>(8)</span></a></li>
                                <li><a href="#">Family Houses<span>(23)</span></a></li>
                                <li><a href="#">Offices<span>(5)</span></a></li>
                                <li><a href="#">Villas<span>(63)</span></a></li>
                                <li><a href="#">Other<span>(7)</span></a></li>
                            </ul>
                        </div>
                        <!-- Recent posts start -->
                        <div class="widget recent-posts">
                            <h5 class="sidebar-title">Recent Properties</h5>
                            <div class="media mb-4">
                                <a href="properties-details.html">
                                    <img src="assets/img/sub-property/sub-property.jpg" alt="sub-property">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="properties-details.html">Beautiful Single Home</a>
                                    </h5>
                                    <p>Feb 27, 2020 | $1045,000</p>
                                </div>
                            </div>
                            <div class="media mb-4">
                                <a href="properties-details.html">
                                    <img src="assets/img/sub-property/sub-property-2.jpg" alt="sub-property-2">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="properties-details.html">Sweet Family Home</a>
                                    </h5>
                                    <p>Mar 14, 2020 | $944,000</p>
                                </div>
                            </div>
                            <div class="media">
                                <a href="properties-details.html">
                                    <img src="assets/img/sub-property/sub-property-3.jpg" alt="sub-property-3">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="properties-details.html">Real Luxury Villa</a>
                                    </h5>
                                    <p>Apr 14, 2020 | $1420,000</p>
                                </div>
                            </div>
                        </div>
                        <!-- Social list start -->
                        <div class="social-list widget clearfix">
                            <h5 class="sidebar-title">Follow Us</h5>
                            <ul>
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- Sell Your Property -->
                        <div class="sell-your-properties">
                            <h3>Sell Your Property</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tortor dui, scelerisque ac nisi
                            </p>
                            <p></p>
                            <a href="properties-details.html" class="btn btn-md btn-color">Register Now</a>
                        </div>
                        <!-- Financing calculator  start -->
                        <div class="contact-3 financing-calculator widget-3">
                            <h5 class="sidebar-title">Mortgage Calculator</h5>
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label">Property Price</label>
                                    <input type="text" class="form-control" placeholder="$36.400">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Interest Rate (%)</label>
                                    <input type="text" class="form-control" placeholder="10%">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Period In Months</label>
                                    <input type="text" class="form-control" placeholder="10 Months">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Down PaymenT</label>
                                    <input type="text" class="form-control" placeholder="$21,300">
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit"
                                        class="btn btn-color btn-md btn-message btn-block">Cauculate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Properties details page start -->
@endsection
