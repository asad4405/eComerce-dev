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
                            <img src="assets/images/cart/cart_img_1.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                    <li>
                        <div class="item_image">
                            <img src="assets/images/cart/cart_img_2.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                    <li>
                        <div class="item_image">
                            <img src="assets/images/cart/cart_img_3.jpg" alt="image_not_found">
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
                    <li>My Account</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end
                                                    ================================================== -->

        <!-- account_section - start
                                                    ================================================== -->
        <section class="account_section section_space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 account_menu">
                        <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link text-start active w-100" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">Account Dashboard </button>
                            <button class="nav-link text-start w-100" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">Acount</button>
                            <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">My Orders</button>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                            <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <h5>Welcome to Account</h5>
                                <h5>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="route('logout')" class="btn btn-danger"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">Log Out</a>

                                    </form>
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <h5 class="text-center pb-3">Account Details</h5>
                                <form class="row g-3 p-2">
                                    <div class="col-md-6">
                                        <label for="inputnamel4" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="inputnamel4" value="Mr. Jon Doe">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4" value="jon@doe.com">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputPassword4" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary active">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                <h5 class="text-center pb-3">Your Orders</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Order No</th>
                                        <th>Sub Total</th>
                                        <th>Discount</th>
                                        <th>Delivery Charge</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>#120</td>
                                        <td>52500</td>
                                        <td>200</td>
                                        <td>100</td>
                                        <td>52400</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Download Invoice</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- account_section - end
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
        <!-- newsletter_section - end
                                                    ================================================== -->

    </main>
    <!-- main body - end
                                                ================================================== -->
@endsection
