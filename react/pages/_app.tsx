import '../styles/globals.css'
import type {AppProps} from 'next/app'
import "bootstrap/dist/css/bootstrap.min.css"
import Footer from "../components/Footer";
import Header from "../components/Header";
import {store} from "../stores"
import {Provider} from "react-redux";

export default function App({Component, pageProps}: AppProps) {


    return (
        <div className="main">
            <Provider store={store}>
                <Header/>
                <Component {...pageProps} />
                <Footer/>
            </Provider>
        </div>
    )
}