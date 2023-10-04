import React, {createContext, useContext, useState} from 'react';
import {useRouter} from "next/router";
import {useDispatch, useSelector} from "react-redux";
import {PostMethodService} from "@/services/PostMethodService";
import {login, logout} from "@/stores/actions/AuthActions";

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
    const [isLoading, setIsLoading] = useState(false);
    const isAuthenticated = useSelector((state) => state.authReducer.isAuthenticated);
    const authUser = useSelector(state => state.authReducer.user);
    const token = useSelector((state) => state.authReducer.token)

    const handleChange = (e) => {
        setFormData({...formData, [e.target.name]: e.target.value});
    };

    const handleLogin = async (e) => {
        e.preventDefault();
        setIsLoading(true);

        try {
            const response = await PostMethodService('login', formData);

            if (response.statusCode === 422) {
                setErrors(response.errors);
                setIsLoading(false);
            } else {
                const authData = {
                    token: response.data.token,
                    user: response.data.user
                }

                if (authData.token) {
                    dispatch(login(authData));
                    setToastMessage({message: 'Login Successfully', type: 'success'});
                    setIsLoading(false);
                    await router.push('/');
                } else {
                    setToastMessage({message: 'Undefined Token', type: 'error'});
                    setIsLoading(false);
                }

                setFormData({email: '', password: ''});
                setErrors([])
            }
        } catch (error) {
            setToastMessage({message: 'An error occurred while logging in', type: 'error'});
            setIsLoading(false);
        }
    };

    const handleLogout = async () => {
        try {
            if (token) {
                const response = await PostMethodService('logout', {}, token);

                // if (response.statusCode === 200) {
                    dispatch(logout());
                    setToastMessage({message: 'Logout Successfully', type: 'success'});
                    await router.push('/login');
                // }
            }

            // setToastMessage({message: 'An error occurred while logging out', type: 'error'});

        } catch (error) {
            setToastMessage({message: 'An error occurred while logging out', type: 'error'});
        }
    };


    return (
        <LoginContext.Provider
            value={{
                errors,
                formData,
                toastMessage,
                handleChange,
                handleLogin,
                handleLogout,
                isAuthenticated,
                isLoading,
                authUser
        }}
        >
            {children}
        </LoginContext.Provider>
    );
};
