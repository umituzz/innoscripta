import React from 'react';
import {LoginProvider} from './LoginContext';
import {RegisterProvider} from './RegisterContext';
import {ArticleProvider} from "./ArticleContext";
import {PreferenceProvider} from "./PreferenceContext";
import {authToken} from "../helpers/authHelper";

const AppProvider = ({children}) => {
    const token = authToken();

    if (token) {
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
     } else {
        return (
            <LoginProvider>
                <RegisterProvider>
                    <ArticleProvider>
                        {children}
                    </ArticleProvider>
                </RegisterProvider>
            </LoginProvider>
        )
     }
};

export default AppProvider;
