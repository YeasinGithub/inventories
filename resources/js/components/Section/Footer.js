import React from 'react';

function Footer() {
    return (
        <div className="footer section pt-40">
        <div className="container">
          <div className="row">
            <div className="col-lg-3 footer-block">
              <h4 className="footer-title py-2">Information</h4>
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Delivery Information</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="about.html">Contact Us</a></li>
              </ul>
            </div>
            <div className="col-lg-3 footer-block">
              <h4 className="footer-title py-2">Services</h4>
              <ul>
                <li><a href="#">Returns</a></li>
                <li><a href="#">Site Map</a></li>
                <li><a href="#">Wish List</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Order History</a></li>
              </ul>
            </div>
            <div className="col-lg-3 footer-block">
              <h4 className="footer-title py-2">Extras</h4>
              <ul>
                <li><a href="#">Brands</a></li>
                <li><a href="#">Gift Certificates</a></li>
                <li><a href="#">Affiliates</a></li>
                <li><a href="#">Specials</a></li>
                <li><a href="#">Newsletter</a></li>
              </ul>
            </div>
            <div className="col-lg-3 footer-block">
              <h4 className="footer-title py-2">Contacts</h4>
              <ul>
                <li className="add">Warehouse & Offices, 12345 Street name, California USA</li>
                <li className="phone">(+123) 456 789
                  <br/> (+024) 666 888</li>
                <li className="email">Contact@yourcompany.com</li>
              </ul>
            </div>
          </div>
          {/* <!-- =====  Newslatter ===== --> */}
          <div className="newsletters mt-30">
            <div className="news-head pull-left">
              <h2>Subscribe for our offer news</h2>
            </div>
            <div className="news-form pull-right">
              <form onsubmit="return validatemail();" method="post">
                <div className="form-group required">
                  <input name="email" id="email" placeholder="Enter Your Email" className="form-control input-lg" required="" type="email" />
                  <button type="submit" className="btn btn-default btn-lg">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
          {/* <!-- =====  Newslatter End ===== --> */}
        </div>
  
        <div className="footer-bottom">
          <div className="container">
            <div className="row">
              <div className="col-12 col-lg-4 mt-20">
                <div className="section_title">payment option </div>
                <div className="payment-icon text-center">
                  <ul>
                    <li><i className="fab fa-cc-paypal"></i></li>
                    <li><i className="fab fa-cc-visa"></i></li>
                    <li><i className="fab fa-cc-discover"></i></li>
                    <li><i className="fab fa-cc-mastercard"></i></li>
                    <li><i className="fab fa-cc-amex"></i></li>
                  </ul>
                </div>
              </div>
  
              <div className="col-12 col-lg-4 mt-20">
                <div className="section_title">download app</div>
                <div className="app-download text-center">
                  <ul className="app-icon">
                    <li><a href="#" title="playstore"><img src="frontend/images/play-store.png" alt="playstore" className="img-responsive" /></a></li>
                    <li><a href="#" title="appstore"><img src="frontend/images/app-store.png" alt="appstore" className="img-responsive" /></a></li>
                  </ul>
                </div>
              </div>
              <div className="col-12 col-lg-4 mt-20">
                <div className="section_title">Social media</div>
                <div className="social_icon text-center">
                  <ul>
                    <li><a href="#"><i className="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i className="fab fa-google-plus-g"></i></a></li>
                    <li><a href="#"><i className="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i className="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i className="fas fa-rss"></i></a></li>
                  </ul>
                </div>
              </div>
              <div className="col-12 ">
                <div className="copyright-part text-center pt-10 pb-10 mt-30">@ 2019 All Rights Reserved Bigmarket</div>
              </div>
            </div>
          </div>
        </div>
      </div>
             
        )
    }
    
    export default Footer