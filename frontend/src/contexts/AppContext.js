import React from 'react';
import {LoginProvider} from './LoginContext';
import {RegisterProvider} from './RegisterContext';
import {ArticleProvider} from "./ArticleContext";
import {PreferenceProvider} from "./PreferenceContext";

const AppProvider = ({children}) => {
        return (
            <LoginProvider>
                <RegisterProvider>
                    <ArticleProvider>
                        <PreferenceProvider>
                            {children}
                        </PreferenceProvider>
                    </ArticleProvider>
                </RegisterProvider>
            </LoginProvider>
        )
};

export default AppProvider;
