import React from "react";
import Meta from "@/components/Meta";
import Header from '@/components/Header';
import Footer from '@/components/Footer';
import {MainLayoutInterface} from "@/interfaces/MainLayoutInterface";

const MainLayout = ({title, description, children}: MainLayoutInterface) => {
    return (
        <>
            <Meta title={title} description={description}/>
            <Header/>
            <main>
                {children}
            </main>
            <Footer/>
        </>
    );
};

export default MainLayout;
