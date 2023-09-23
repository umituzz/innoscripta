import React from 'react';
import { LoginProvider } from './LoginContext';
import { RegisterProvider } from './RegisterContext';

const AppProvider = ({ children }) => {
    return (
        <LoginProvider>
            <RegisterProvider>
                {children}
            </RegisterProvider>
        </LoginProvider>
    );
};

export default AppProvider;
