import React from 'react';

function Modal() {
    return (
        
    <div id="subscribe-me-" className="modal animated" role="dialog" data-keyboard="true" tabindex="-1">
        <div className="newsletter-popup row align-items-center py-4  px-2"> 
          <img src="frontend/images/newsbg.html" alt="offer" className="offer col d-none d-sm-block" />
          <div className="col-auto newsletter-popup-static newsletter-popup-top">
            <div className="popup-text">
              <div className="popup-title">50% <span>off</span></div>
              <div className="popup-desc mb-30">
                <div>Sign up and get 50% off your next Order</div>
              </div>
            </div>
            <form onsubmit="return  validatpopupemail();" method="post">
              <div className="form-group required">
                <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" className="form-control input-lg" required="" />
              </div>
              <div className="form-group required">
                <button type="submit" className="btn" id="email-popup-submit">Subscribe</button>
              </div>
              <div className="form-check">
                <input type="checkbox" className="form-check-input" id="checkme" />
                <label className="form-check-label" for="checkme">Dont show again</label>
              </div>
            </form>
          </div>
        </div>
      </div>

        )
    }
    
    export default Modal