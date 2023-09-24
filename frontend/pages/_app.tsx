import '../styles/globals.css';
import "bootstrap/dist/css/bootstrap.min.css";
import 'react-toastify/dist/ReactToastify.css';
import React from "react";
import type {AppProps} from 'next/app';
import {Provider} from "react-redux";
import {ToastContainer} from 'react-toastify';
import {store} from "../stores";
import Footer from "../components/Footer";
import Header from "../components/Header";
import WebVitals from '../web-vitals';
import RouterHandler from '../components/RouterHandler';
import AppProvider from "../contexts/AppContext";

function App({Component, pageProps}: AppProps) {
    return (
        <div className="main">
            <Provider store={store}>
                <AppProvider>
                    <ToastContainer autoClose={500}/>
                    <Header/>
                    <Component {...pageProps} />
                    <Footer/>
                    <WebVitals/>
                    <RouterHandler/>
                </AppProvider>
            </Provider>
        </div>
    );
}

export default App;
