@extends('layouts.frontend_master')
@section('content')
    <!-- main body - start
                                                                                                                                                                                                                                                                                    ================================================== -->
    <main>

        <!-- sidebar cart - start
                                                                                                                                                                                                                                                                                        ================================================== -->
        <div class="sidebar-menu-wrapper">
            <div class="cart_sidebar">
                <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
                <ul class="cart_items_list ul_li_block mb_30 clearfix">
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('frontend_assets') }}/images/cart/cart_img_1.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('frontend_assets') }}/images/cart/cart_img_2.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('frontend_assets') }}/images/cart/cart_img_3.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                </ul>

                <ul class="total_price ul_li_block mb_30 clearfix">
                    <li>
                        <span>Subtotal:</span>
                        <span>$90</span>
                    </li>
                    <li>
                        <span>Vat 5%:</span>
                        <span>$4.5</span>
                    </li>
                    <li>
                        <span>Discount 20%:</span>
                        <span>- $18.9</span>
                    </li>
                    <li>
                        <span>Total:</span>
                        <span>$75.6</span>
                    </li>
                </ul>
                <ul class="btns_group ul_li_block clearfix">
                    <li><a class="btn btn_primary" href="cart.html">View Cart</a></li>
                    <li><a class="btn btn_secondary" href="checkout.html">Checkout</a></li>
                </ul>
            </div>
            <div class="cart_overlay"></div>
        </div>
        <!-- sidebar cart - end
                                                                                                                                                                                                                                                                                        ================================================== -->

        <!-- breadcrumb_section - start
                                                                                                                                                                                                                                                                                        ================================================== -->
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_nav ul_li">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Product Details</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end
                                                                                                                                                                                                                                                                                        ================================================== -->

        <!-- product_details - start
                                                                                                                                                                                                                                                                                        ================================================== -->
        <section class="product_details section_space pb-0">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="product_details_image">
                            <div class="details_image_carousel">

                                @foreach (App\Models\Product_photo::where('product_id', $product->id)->get() as $product_photo)
                                    <div class="slider_item">
                                        <img src="{{ asset('uploads/product_photos') }}/{{ $product_photo->product_photo }}"
                                            alt="image_not_found">
                                    </div>
                                @endforeach
                            </div>

                            <div class="details_image_carousel_nav">
                                @foreach (App\Models\Product_photo::where('product_id', $product->id)->get() as $product_photo)
                                    <div class="slider_item">
                                        <img src="{{ asset('uploads/product_photos') }}/{{ $product_photo->product_photo }}"
                                            alt="image_not_found">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="product_details_content">
                            <h2 class="item_title">{{ $product->product_name }}</h2>
                            <p>
                                {{ $product->product_short_details }}
                            </p>
                            <div class="item_review">
                                <ul class="rating_star ul_li">
                                    <li><i class="fas fa-star"></i>></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                </ul>
                                <span class="review_value">3 Rating(s)</span>
                            </div>

                            <div class="item_price">
                                <span id="discount_price">$620.00</span>
                                <del id="regular_price">$720.00</del>
                            </div>
                            <div>
                                <span id="product_stock"></span>
                            </div>
                            <hr>

                            <div class="item_attribute">
                                <form action="#">
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <div class="select_option clearfix">
                                                <h4 class="input_title">Size *</h4>
                                                <select id="size_dropdown">
                                                    <option data-display="- Please select -">- Choose One Size -</option>
                                                    @foreach ($available_sizes as $available_size)
                                                        <option value="{{ $available_size->size->id }}">
                                                            {{ $available_size->size->size_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <div class="select_option clearfix">
                                                <h4 class="input_title">Color *</h4>
                                                <select id="color_dropdown">
                                                    <option value=''>- Select Size First -</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="quantity_wrap">
                                <div class="quantity_input">
                                    <button type="button" class="input_number_decrement">
                                        <i class="fal fa-minus"></i>
                                    </button>
                                    <input class="input_number" type="text" value="1" id="user_input"
                                        name="quantity">
                                    <button type="button" class="input_number_increment">
                                        <i class="fal fa-plus"></i>
                                    </button>
                                </div>
                                <div class="total_price">Total: $620,99</div>
                            </div>

                            <ul class="default_btns_group ul_li">
                                <li>
                                    @auth
                                        <button class="btn btn_primary addtocart_btn d-none" id="add_to_cart">
                                            Add To Cart
                                        @else
                                            <a class="btn btn_primary addtocart_btn d-none" href="{{ route('login') }}"
                                                id="add_to_cart">Login</a>
                                        @endauth
                                    </button>
                                </li>
                            </ul>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="details_information_tab">
                    <ul class="tabs_nav nav ul_li" role=tablist>
                        <li>
                            <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button"
                                role="tab" aria-controls="description_tab" aria-selected="true">
                                Description
                            </button>
                        </li>
                        <li>
                            <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button"
                                role="tab" aria-controls="additional_information_tab" aria-selected="false">
                                Additional information
                            </button>
                        </li>
                        <li>
                            <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab"
                                aria-controls="reviews_tab" aria-selected="false">
                                Reviews(2)
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                                tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo
                                gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                            <p class="mb-0">
                                Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum
                                turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam,
                                purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non
                                neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et
                                placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque
                                metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet
                                ligula euismod eget.
                            </p>
                        </div>

                        <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                            <p>
                                Return into stiff sections the bedding was hardly able to cover it and seemed ready to slide
                                off any moment. His many legs, pitifully thin compared with the size of the rest of him,
                                waved about helplessly as he looked what's happened to me he thought It wasn't a dream. His
                                room, a proper human room although a little too small
                            </p>

                            <div class="additional_info_list">
                                <h4 class="info_title">Additional Info</h4>
                                <ul class="ul_li_block">
                                    <li>No Side Effects</li>
                                    <li>Made in USA</li>
                                </ul>
                            </div>

                            <div class="additional_info_list">
                                <h4 class="info_title">Product Features Info</h4>
                                <ul class="ul_li_block">
                                    <li>Compatible for indoor and outdoor use</li>
                                    <li>Wide polypropylene shell seat for unrivalled comfort</li>
                                    <li>Rust-resistant frame</li>
                                    <li>Durable UV and weather-resistant construction</li>
                                    <li>Shell seat features water draining recess</li>
                                    <li>Shell and base are stackable for transport</li>
                                    <li>Choice of monochrome finishes and colourways</li>
                                    <li>Designed by Nagi</li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                            <div class="average_area">
                                <div class="row align-items-center">
                                    <div class="col-md-12 order-last">
                                        <div class="average_rating_text">
                                            <ul class="rating_star ul_li_center">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <p class="mb-0">
                                                Average Star Rating: <span>4 out of 5</span> (2 vote)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="customer_reviews">
                                <h4 class="reviews_tab_title">2 reviews for this product</h4>
                                <div class="customer_review_item clearfix">
                                    <div class="customer_image">
                                        <img src="{{ asset('frontend_assets') }}/images/team/team_1.jpg"
                                            alt="image_not_found">
                                    </div>
                                    <div class="customer_content">
                                        <div class="customer_info">
                                            <ul class="rating_star ul_li">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star-half-alt"></i></li>
                                            </ul>
                                            <h4 class="customer_name">Aonathor troet</h4>
                                            <span class="comment_date">JUNE 2, 2021</span>
                                        </div>
                                        <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                                    </div>
                                </div>

                                <div class="customer_review_item clearfix">
                                    <div class="customer_image">
                                        <img src="{{ asset('frontend_assets') }}/images/team/team_2.jpg"
                                            alt="image_not_found">
                                    </div>
                                    <div class="customer_content">
                                        <div class="customer_info">
                                            <ul class="rating_star ul_li">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star-half-alt"></i></li>
                                            </ul>
                                            <h4 class="customer_name">Danial obrain</h4>
                                            <span class="comment_date">JUNE 2, 2021</span>
                                        </div>
                                        <p class="mb-0">
                                            Great product quality, Great Design and Great Service.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="customer_review_form">
                                <h4 class="reviews_tab_title">Add a review</h4>
                                <form action="#">
                                    <div class="form_item">
                                        <input type="text" name="name" placeholder="Your name*">
                                    </div>
                                    <div class="form_item">
                                        <input type="email" name="email" placeholder="Your Email*">
                                    </div>
                                    <div class="your_ratings">
                                        <h5>Your Ratings:</h5>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                    </div>
                                    <div class="form_item">
                                        <textarea name="comment" placeholder="Your Review*"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn_primary">Submit Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product_details - end
                                                                                                                                                                                                                                                                                        ================================================== -->

        <!-- related_products_section - start
                                                                                                                                                                                                                                                                                        ================================================== -->
        <section class="related_products_section section_space">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="best-selling-products related-product-area">
                            <div class="sec-title-link">
                                <h3>Related products</h3>
                                <div class="view-all"><a href="{{ route('shop') }}">View all<i
                                            class="fal fa-long-arrow-right"></i></a></div>
                            </div>
                            <div class="product-area clearfix">
                                <div class="grid">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_assets') }}/images/shop/product_img_12.png" alt>

                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Macbook Pro</a></h4>
                                        <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <span class="price">
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                    </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related_products_section - end
                                                                                                                                                                                                                                                                                        ================================================== -->

        <!-- newsletter_section - start
                                                                                                                                                                                                                                                                                        ================================================== -->
        <section class="newsletter_section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col col-lg-6">
                        <h2 class="newsletter_title text-white">Sign Up for Newsletter </h2>
                        <p>Get E-mail updates about our latest products and special offers.</p>
                    </div>
                    <div class="col col-lg-6">
                        <form action="#!">
                            <div class="newsletter_form">
                                <input type="email" name="email" placeholder="Enter your email address">
                                <button type="submit" class="btn btn_secondary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function() {
            $('#size_dropdown').change(function() {
                var product_id = {{ $product->id }};
                var size_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // ajax code start
                $.ajax({
                    type: 'POST',
                    url: '/color/list',
                    data: {
                        product_id: product_id,
                        size_id: size_id,
                    },
                    success: function(data) {
                        $('#add_to_cart').addClass('d-none');

                        $('#color_dropdown').html(data);
                    }
                });
                // ajax code end
            });

            $('#color_dropdown').change(function() {
                var product_id = {{ $product->id }};
                var size_id = $('#size_dropdown').val();
                var color_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // ajax code start
                $.ajax({
                    type: 'POST',
                    url: '/price/qunatity',
                    data: {
                        product_id: product_id,
                        size_id: size_id,
                        color_id: color_id
                    },
                    success: function(data) {
                        if (data.split('#')[2] == 0) {
                            $('#add_to_cart').addClass('d-none');
                            $('#discount_price').html('Stock Out');
                        } else {
                            $('#add_to_cart').removeClass('d-none');

                            $('#discount_price').html('$' + data.split('#')[0]);
                            $('#regular_price').html('$' + data.split('#')[1]);
                            $('#product_stock').html(data.split('#')[2]);
                        }
                    }
                });
                // ajax code end
            });

            $('#add_to_cart').click(function() {
                var product_stock = $('#product_stock').html();
                var user_input = $('#user_input').val();

                if (parseInt(product_stock) < parseInt(user_input)) {
                    Swal.fire({
                        title: "Good job!",
                        text: "You clicked the button!",
                        icon: "success"
                    });
                }else{
                    alert('thik ase')
                }

                // var product_id = {{ $product->id }};
                // var size_id = $('#size_dropdown').val();
                // var color_id = $('#color_dropdown').val();
            });
        });
    </script>
@endsection
