import '@/styles/globals.scss';
import "bootstrap/dist/css/bootstrap.min.css";
import 'react-toastify/dist/ReactToastify.css';
import React from "react";
import type {AppProps} from 'next/app';
import {Provider} from "react-redux";
import {ToastContainer} from 'react-toastify';
import WebVitals from '../../web-vitals';
import {store} from "@/stores";
import AppProvider from "@/contexts/AppContext";

function App({Component, pageProps}: AppProps) {
    return (
        <div className="main">
            <Provider store={store}>
                <AppProvider>
                    <ToastContainer autoClose={500}/>
                        <Component {...pageProps} />
                    <WebVitals/>
                </AppProvider>
            </Provider>
        </div>
    );
}

export default App;
