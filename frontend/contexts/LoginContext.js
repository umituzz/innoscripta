import React, {createContext, useContext, useState} from 'react';
import {useRouter} from "next/router";
import {useDispatch, useSelector} from "react-redux";
import {PostDataService} from "../services/PostDataService";
import {login, logout} from "../stores/actions/AuthActions";

const LoginContext = createContext();

export const useLoginContext = () => {
    return useContext(LoginContext);
};

export const LoginProvider = ({children}) => {
    const router = useRouter();
    const dispatch = useDispatch();
    const [errors, setErrors] = useState({});
    const [formData, setFormData] = useState({
        email: '',
        password: '',
    });
    const [toastMessage, setToastMessage] = useState(null);

    const handleChange = (e) => {
        setFormData({...formData, [e.target.name]: e.target.value});
    };

    const handleLogin = async (e) => {
        e.preventDefault();

        try {
            const response = await PostDataService('login', formData);

            console.log(response)

            if (response.statusCode === 422) {
                setErrors(response.errors);
            } else {
                const token = response.data.token;

                if (token) {
                    dispatch(login(token));
                    setFormData({email: '', password: ''});
                    setToastMessage({message: 'Login Successfully', type: 'success'});
                    await router.push('/');
                } else {
                    setToastMessage({message: 'Undefined Token', type: 'error'});
                }
            }
        } catch (error) {
            setToastMessage({message: 'An error occurred while logging in', type: 'error'});
        }
    };

    const handleLogout = async () => {
        try {
            await PostDataService('logout');
            dispatch(logout());
            setToastMessage({message: 'Logout Successfully', type: 'success'});
            await router.push('/login');
        } catch (error) {
            setToastMessage({message: 'An error occurred while logging out', type: 'error'});
        }
    };

    const isAuthenticated = useSelector((state) => state.authReducer.isAuthenticated);

    return (
        <LoginContext.Provider
            value={{errors, formData, toastMessage, handleChange, handleLogin, handleLogout, isAuthenticated}}
        >
            {children}
        </LoginContext.Provider>
    );
};
