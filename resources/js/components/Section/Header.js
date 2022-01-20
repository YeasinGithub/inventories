import React from 'react';

function Header() {
    return (
        
  <header id="header" className="section">
      <div className="container">
        <div className="header-top py-1">
          <div className="row align-items-center">
          <div class="col-md-6">
              <ul class="header-top-left pull-left">              
                <li class="language dropdown px-2"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Language <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">German</a></li>
                  </ul>
                </li>
                <li class="currency dropdown pr-2"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Currency <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                    <li><a href="#">€ Euro</a></li>
                    <li><a href="#">£ Pound Sterling</a></li>
                    <li><a href="#">$ US Dollar</a></li>
                  </ul>
                </li>
              </ul> 
            </div>
            <div className="col-md-6">
              <ul className="header-top-right pull-right">
                <li className="telephone">
                  <a href="#"><i className="fa fa-phone"></i> +91 987-654-321</a> 
                </li>
                <li className="login">
                  <a href="login.html"><i className="fa fa-user"></i>Login</a>
                </li>
                <li className="register">
                  <a href="register.html">Signup</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div className="header section pt-15 pb-15">
        <div className="container">
          <div className="row">
            <div className="navbar-header col-2 header-bottom-left"> <a className="navbar-brand" href="index.html"> <img alt="Bigmarket" src="frontend/images/logo.png" /> </a> </div>
            <div className="col-10 header-bottom-right">
              <div className="header-menu">
                <div className="responsive-menubar-block">
                  <span>Shop By<br/> Category</span>
                  <span className="menu-bar collapsed" data-target=".navbar-ex1-collapse" data-toggle="collapse"><i className="fa fa-bars"></i></span>
                </div>
                <nav id="menu" className="navbar">
                  <div className="collapse navbar-collapse navbar-ex1-collapse">
                    <ul className="nav navbar-nav main-navigation">
                      <li className="main_cat dropdown active"> <a href="category_page.html">Grocery & Staples</a>
                        <div className="dropdown-menu megamenu column4">
                          <div className="dropdown-inner">
                            <ul className="list-unstyled childs_1">
                              
                             
                              <li className="dropdown active"><a href="category_page.html">Daal & Pulses</a>
                                <div className="dropdown-menu">
                                  <div className="dropdown-inner">
                                    <ul className="list-unstyled childs_2">
                                      <li className="active"><a href="category_page.html">Arhar</a></li>
                                      <li><a href="category_page.html">Masoor</a></li>
                                      <li><a href="category_page.html">Moong</a></li>
                                      <li><a href="category_page.html">Rajma & Chana</a></li>
                                      <li><a href="category_page.html">Urad</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              
                            
                            </ul>
                            <ul className="list-unstyled childs_1">
                              
                             
                              <li className="dropdown active"><a href="category_page.html">Dry Fruits & Nuts</a>
                                <div className="dropdown-menu">
                                  <div className="dropdown-inner">
                                    <ul className="list-unstyled childs_2">
                                      <li className="active"><a href="category_page.html">Akhrot & Figs</a></li>
                                      <li><a href="category_page.html">Almonds & Cashews</a></li>
                                      <li><a href="category_page.html">Nuts & Seeds</a></li>
                                      <li><a href="category_page.html">Other Dry Fruits</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              
                        
                            </ul>
                            <ul className="list-unstyled childs_1">
                              
                             
                              <li className="dropdown active"><a href="#">Edible Oils</a>
                                <div className="dropdown-menu">
                                  <div className="dropdown-inner">
                                    <ul className="list-unstyled childs_2">
                                      <li className="active"><a href="category_page.html">Groundnut & Coconut Oil</a></li>
                                      <li><a href="category_page.html">Health Oils</a></li>
                                      <li><a href="category_page.html">Mustard Oils</a></li>
                                      <li><a href="category_page.html">Soyabean Oils</a></li>
                                      <li><a href="category_page.html">Sunflower Oils</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              
                         
                            </ul>
                            <ul className="list-unstyled childs_1">
                              
                             
                              <li className="dropdown active"><a href="category_page.html">Riced cauliflower</a>
                                <div className="dropdown-menu">
                                  <div className="dropdown-inner">
                                    <ul className="list-unstyled childs_2">
                                      <li className="active"><a href="category_page.html">Basmati</a></li>
                                      <li><a href="category_page.html">Millet & Others</a></li>
                                      <li><a href="category_page.html">Poha</a></li>
                                      <li><a href="category_page.html">Sonamasuri & Kolam</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                        
                            </ul>
                            <div className="menu-image"> <img src="frontend/images/13.jpg" alt="" title="" className="img-thumbnail" /> </div>
                          </div>
                        </div>
                      </li>
                      <li className="main_cat dropdown"> <a href="category_page.html">Personal Care</a>
                        <div className="dropdown-menu megamenu column1">
                          <div className="dropdown-inner">
                            <ul className="list-unstyled childs_1">
                              
                             
                              <li className="main_cat active"> <a href="category_page.html">Deos & Perfumes</a> </li>
                              <li className="main_cat"> <a href="category_page.html">Hair Care</a> </li>
                              
                             
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li className="main_cat dropdown"> <a href="category_page.html">Biscuits, Snacks & Chocolates</a>
                        <div className="dropdown-menu megamenu column1">
                          <div className="dropdown-inner">
                            <ul className="list-unstyled childs_1">
                              
                             
                              <li className="main_cat active"> <a href="category_page.html">Biscuits & Cookies</a> </li>
                              <li className="main_cat"> <a href="#">Chips & Crisps</a> </li>
                              
                             
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li className="main_cat dropdown"> <a href="category_page.html">Household Needs</a>
                        <div className="dropdown-menu megamenu column1">
                          <div className="dropdown-inner">
                            <ul className="list-unstyled childs_1">
                              
                             
                              <li className="main_cat active"> <a href="category_page.html">Cleaning Tools & Brushes</a> </li>
                              <li className="main_cat"> <a href="category_page.html">Home & Car Fresheners</a> </li>
                              
                             
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li className="main_cat dropdown"> <a href="category_page.html">Breakfast & Dairy</a>
                        <div className="dropdown-menu megamenu column1">
                          <div className="dropdown-inner">
                            <ul className="list-unstyled childs_1">
                              
                             
                              <li className="main_cat active"> <a href="category_page.html">Breakfast Cereal & Mixes</a> </li>
                              <li className="main_cat"> <a href="category_page.html">Paneer & Curd</a> </li>
                              
                             
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li className="main_cat thumb"> <a href="category_page.html">Fruits store </a>
                        <div className="dropdown-menu">
                          <div className="dropdown-inner"> <img src="#" alt="" title="" className="img-thumbnail" /> </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </nav>
              </div>
              <div className="header-link-search">
                <div className="header-search">
                  <div className="actions">
                      <button type="submit" title="Search" className="action search" id="head-search"></button>
                  </div>
                  <div id="search" className="input-group">
                    <input type="text" id="search-input" name="search" value="" placeholder="Search" className="form-control input-lg" autocomplete="off" />
                    <span className="input-group-btn">
                      <button type="button" className="btn btn-default btn-lg">Search</button>
                    </span>
                  </div>
                </div>
                <div className="header-link">
                 <ul className="list-unstyled">
                  <li><a href="#">Bm offers</a></li>
                  <li><a href="#">Bm express</a></li>
                  <li><a href="#">Bm speciality</a></li>
                  <li><a href="#">Bm store</a></li>
                </ul>
              </div>
              </div>
              <div className="shopcart">
                <div id="cart" className="btn-block mt-40 mb-30 ">
                  <button type="button" className="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true"><span id="shippingcart">My basket</span><span id="cart-total">Item 0</span></button>
                  <a href="cart_page.html" className="cart_responsive btn"><span id="cart-text">My basket</span><span id="cart-total-res">0</span> </a>
                </div>
                <div id="cart-dropdown" className="cart-menu collapse">
                  <ul>
                    <li>
                      <table className="table table-striped">
                        <tbody>
                          <tr>
                            <td className="text-center"><a href="#"><img src="frontend/images/pro/70x70_1.jpg" alt="iPod classNameic" title="iPod classNameic" /></a></td>
                            <td className="text-left product-name"><a href="#">MacBook Pro</a> <span className="text-left price">$20.00</span>
                              <input className="cart-qty" name="product_quantity" min="1" value="1" type="number" />
                            </td>
                            <td className="text-center"><a className="close-cart"><i className="fa fa-times-circle"></i></a></td>
                          </tr>
                          <tr>
                            <td className="text-center"><a href="#"><img src="frontend/images/pro/70x70_2.jpg" alt="iPod classNameic" title="iPod classNameic" /></a></td>
                            <td className="text-left product-name"><a href="#">MacBook Pro</a> <span className="text-left price">$20.00</span>
                              <input className="cart-qty" name="product_quantity" min="1" value="1" type="number" />
                            </td>
                            <td className="text-center"><a className="close-cart"><i className="fa fa-times-circle"></i></a></td>
                          </tr>
                        </tbody>
                      </table>
                    </li>
                    <li>
                      <table className="table">
                        <tbody>
                          <tr>
                            <td className="text-right"><strong>Sub-Total</strong></td>
                            <td className="text-right">$2,100.00</td>
                          </tr>
                          <tr>
                            <td className="text-right"><strong>Eco Tax (-2.00)</strong></td>
                            <td className="text-right">$2.00</td>
                          </tr>
                          <tr>
                            <td className="text-right"><strong>VAT (20%)</strong></td>
                            <td className="text-right">$20.00</td>
                          </tr>
                          <tr>
                            <td className="text-right"><strong>Total</strong></td>
                            <td className="text-right">$2,122.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </li>
                    <li>
                      <form action="http://html.lionode.com/bigmarket/bm002/cart_page.html">
                        <input className="btn pull-left" value="View cart" type="submit" />
                      </form>
                      <form action="http://html.lionode.com/bigmarket/bm002/checkout_page.html">
                        <input className="btn pull-right" value="Checkout" type="submit" />
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div className="header-static-block">
        <div className="container">
          <div className="row">
            <div className="icon-block">
              <div className="home_icon">
              <a href="index.html"><i className="fa fa-home"></i>Home</a>
              </div>
              <div className="search_icon">
              <a href="#"><i className="fa fa-search"></i>Search</a>
              </div>
              <div className="cart_icon">
              </div>
              <div className="login_icon">
                <a href="login.html"><i className="fa fa-user"></i>Login</a>
              </div>
              <div className="telephone_icon">
                <a href="contact_us.html"><i className="fa fa-phone"></i>Contact</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>   


        )
    }
    
    export default Header