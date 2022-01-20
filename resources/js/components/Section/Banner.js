import React from 'react';

import OwlCarousel from 'react-owl-carousel';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel/dist/assets/owl.theme.default.css';


function Banner() {

  
    return (
      
        <div className="banner section">
        <div className="main-banner owl-carousel">
          <div className="item"><a href="#"><img src="frontend/images/main_banner1.jpg" alt="Main Banner" className="img-responsive" /></a></div>
          <div className="item"><a href="#"><img src="frontend/images/main_banner2.jpg" alt="Main Banner" className="img-responsive" /></a></div>
        </div>
      </div>
  

        )
    }
    
export default Banner