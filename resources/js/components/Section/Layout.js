import React from 'react';

import Modal from './Modal.js'
import Navbar from './Navbar.js'
import Header from './Header.js'
import Banner from './Banner.js'
import Container from './Container.js'
import Footer from './Footer.js'

function Layout () {
    return (
        <div>
          <div class="loder"></div>
            <div class="wrapper">
            <Modal />
            <Navbar />
            {/* <Header />
            <Banner />
            <Container />
            <Footer /> */}

          </div>
        </div>
    )
}

export default Layout