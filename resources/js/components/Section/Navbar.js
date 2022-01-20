import React from 'react';

function Navbar() {
  return (

    <nav id="top">
      <div className="container">
        <div className="row"> <span className="responsive-bar"><i className="fa fa-bars"></i></span>
          <div className="header-middle-outer closetoggle">
            <div id="responsive-menu" className="nav-container1 nav-responsive navbar">
              <div className="navbar-collapse navbar-ex1-collapse collapse">
                <ul className="nav navbar-nav">
                  <li className="collapsed" data-toggle="collapse" data-target="#GroceryampStaples"><a href="#">Grocery  Staples</a> <span><i className="fa fa-plus"></i></span>
                    <ul className="menu-dropdown collapse" id="GroceryampStaples">
                      <li className="dropdown"><a href="category_page.html">Daal  Pulses</a>
                        <ul className="list-unstyled childs_2">
                          <li><a href="category_page.html">Arhar</a></li>
                          <li><a href="category_page.html">Masoor</a></li>
                          <li><a href="category_page.html">Moong</a></li>
                          <li><a href="category_page.html">Rajma  Chana</a></li>
                          <li><a href="category_page.html">Urad</a></li>
                        </ul>
                      </li>
                      <li className="dropdown"><a href="5.html">Dry Fruits  Nuts</a>
                        <ul className="list-unstyled childs_2">
                          <li><a href="category_page.html">Akhrot  Figs</a></li>
                          <li><a href="category_page.html">Almonds  Cashews</a></li>
                          <li><a href="category_page.html">Nuts  Seeds</a></li>
                          <li><a href="category_page.html">Other Dry Fruits</a></li>
                        </ul>
                      </li>
                      <li className="dropdown"><a href="6.html">Edible Oils</a>
                        <ul className="list-unstyled childs_2">
                          <li><a href="category_page.html">Groundnut  Coconut Oil</a></li>
                          <li><a href="category_page.html">Health Oils</a></li>
                          <li><a href="category_page.html">Mustard Oils</a></li>
                          <li><a href="category_page.html">Soyabean Oils</a></li>
                          <li><a href="category_page.html">Sunflower Oils</a></li>
                        </ul>
                      </li>
                      <li className="dropdown"><a href="2.html">Riced cauliflower</a>
                        <ul className="list-unstyled childs_2">
                          <li><a href="category_page.html">Basmati</a></li>
                          <li><a href="category_page.html">Millet  Others</a></li>
                          <li><a href="category_page.html">Poha</a></li>
                          <li><a href="category_page.html">Sonamasuri  Kolam</a></li>
                        </ul>
                      </li>
                      <li>
                        <div className="menu-image"> <img src="../../../opencart.lionode.com/bigmarket/oc012019/oc01/image/cache/catalog/13-281x391.jpg" alt="" title="" className="img-thumbnail" /> </div>
                      </li>
                    </ul>
                  </li>
                    <li className="collapsed" data-toggle="collapse" data-target="#PersonalCare"><a href="#">Personal Care</a> <span><i className="fa fa-plus"></i></span>
                      <ul className="menu-dropdown collapse" id="PersonalCare">
                        <li className="main_cat"> <a href="category_page.html">Deos  Perfumes</a> </li>
                        <li className="main_cat"> <a href="category_page.html">Hair Care</a> </li>
                      </ul>
                    </li>
                    <li className="collapsed" data-toggle="collapse" data-target="#Biscuits,SnacksampChocolates"><a href="#">Biscuits, Snacks  Chocolates</a> <span><i className="fa fa-plus"></i></span>
                      <ul className="menu-dropdown collapse" id="Biscuits,SnacksampChocolates">
                        <li className="main_cat"> <a href="category_page.html">Biscuits  Cookies</a> </li>
                        <li className="main_cat"> <a href="category_page.html">Chips  Crisps</a> </li>
                      </ul>
                    </li>
                    <li className="collapsed" data-toggle="collapse" data-target="#HouseholdNeeds"><a href="#">Household Needs</a> <span><i className="fa fa-plus"></i></span>
                      <ul className="menu-dropdown collapse" id="HouseholdNeeds">
                        <li className="main_cat"> <a href="category_page.html">Cleaning Tools  Brushes</a> </li>
                        <li className="main_cat"> <a href="category_page.html">Home  Car Fresheners</a> </li>
                      </ul>
                    </li>
                    <li className="collapsed" data-toggle="collapse" data-target="#BreakfastampDairy"><a href="#">Breakfast  Dairy</a> <span><i className="fa fa-plus"></i></span>
                      <ul className="menu-dropdown collapse" id="BreakfastampDairy">
                        <li className="main_cat"> <a href="category_page.html">Breakfast Cereal  Mixes</a> </li>
                        <li className="main_cat"> <a href="category_page.html">Paneer  Curd</a> </li>
                      </ul>
                    </li>
                    <li><a href="#">Fruits store</a></li>
                </ul>
              </div>
              </div>
            </div>
          </div>
        </div>
    </nav>

      )
}

export default Navbar