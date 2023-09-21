import '../styles/globals.css'
import "bootstrap/dist/css/bootstrap.min.css"
import 'react-toastify/dist/ReactToastify.css';
import type {AppProps} from 'next/app'
import Footer from "../components/Footer";
import Header from "../components/Header";
import {store} from "../stores"
import {Provider} from "react-redux";
import { ToastContainer } from 'react-toastify';
import WebVitals from '../web-vitals';

export default function App({Component, pageProps}: AppProps) {
    return (
        <div className="main">
            <Provider store={store}>
                <ToastContainer autoClose={2000} />
                <Header/>
                <Component {...pageProps} />
                <Footer/>
                <WebVitals />
            </Provider>
        </div>
    )
}