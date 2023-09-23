import React from 'react';
import {LoginProvider} from './LoginContext';
import {RegisterProvider} from './RegisterContext';
import {ArticleProvider} from "./ArticleContext";

const AppProvider = ({children}) => {
    return (
        <LoginProvider>
            <RegisterProvider>
                <ArticleProvider>
                    {children}
                </ArticleProvider>
            </RegisterProvider>
        </LoginProvider>
    );
};

export default AppProvider;
