import React, { createContext, useContext, useState } from 'react';
import {useRouter} from "next/router";
import {useDispatch} from "react-redux";
import {PostDataService} from "../services/PostDataService";
import {login} from "../stores/actions/authAction";

const LoginContext = createContext();

export const useLoginContext = () => {
    return useContext(LoginContext);
};

export const LoginProvider = ({ children }) => {
    const router = useRouter();
    const dispatch = useDispatch();
    const [errors, setErrors] = useState({});
    const [formData, setFormData] = useState({
        email: '',
        password: '',
    });
    const [toastMessage, setToastMessage] = useState(null);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };


    const handleLogin = async (e) => {
        e.preventDefault();

        try {
            const response = await PostDataService('login', formData);

            if (response.statusCode === 422) {
                setErrors(response.errors);
            } else {
                const token = response.data.token;

                if (token) {
                    dispatch(login(token));
                    setFormData({ email: '', password: '' });
                    setToastMessage({ message: 'Login Successfully', type: 'success' });
                    await router.push('/');
                } else {
                    setToastMessage({ message: 'Undefined Token', type: 'error' });
                }
            }
        } catch (error) {
            setToastMessage({ message: 'An error occurred while logging in', type: 'error' });
        }
    };

    return (
        <LoginContext.Provider
            value={{ errors, formData, toastMessage, handleChange, handleLogin }}
        >
            {children}
        </LoginContext.Provider>
    );
};
