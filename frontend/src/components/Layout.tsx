import React from "react";
import HeadComponent from "@/components/HeadComponent";
import Header from './Header';
import Footer from './Footer';
import {LayoutInterface} from "@/interfaces/LayoutInterface";

const Layout = ({ title, description, children }: LayoutInterface) => {
    return (
        <>
            <HeadComponent title={title} description={description} />
            <Header />
            <main>
                {children}
            </main>
            <Footer />
        </>
    );
};

export default Layout;
