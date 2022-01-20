import { divide } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
// import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

import Modal from './Section/Modal.js';
import Navbar from './Section/Navbar.js';
import Header from './Section/Header.js';
import Banner from './Section/Banner.js';
import Container from './Section/Container.js';
import Footer from './Section/Footer.js';



function App() {
    return (
        <div>
            <div class="loder"></div>
            <div class="wrapper">
            <Modal />
            <Navbar />
            <Header />
            <Banner />
            <Container />
            <Footer />
         </div>
        </div>
    )
}

// class App extends Component {

//     render() {
//         return (
//             <div>
//                 <Router>
//                      <Navbar />
//                 </Router>
//             </div>

//         );
//     }
// }



export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}


