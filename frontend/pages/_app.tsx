import '../styles/globals.css';
import "bootstrap/dist/css/bootstrap.min.css";
import 'react-toastify/dist/ReactToastify.css';
import type {AppProps} from 'next/app';
import {Provider} from "react-redux";
import {ToastContainer} from 'react-toastify';
import {store} from "../stores";
import Footer from "../components/Footer";
import Header from "../components/Header";
import WebVitals from '../web-vitals';
import RouterHandler from '../components/RouterHandler';

function App({Component, pageProps}: AppProps) {
    return (
        <div className="main">
            <Provider store={store}>
                <ToastContainer autoClose={2000}/>
                <Header/>
                <Component {...pageProps} />
                <Footer/>
                <WebVitals/>
                <RouterHandler/>
            </Provider>
        </div>
    );
}

export default App;
