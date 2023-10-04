import { createContext, useContext, useState } from 'react';
import {useRouter} from "next/router";
import {PostMethodService} from "@/services/PostMethodService";

const RegisterContext = createContext();

export const useRegisterContext = () => {
    return useContext(RegisterContext);
};

export const RegisterProvider = ({ children }) => {
    const router = useRouter();
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });
    const [errors, setErrors] = useState({});
    const [toastMessage, setToastMessage] = useState(null);
    const [isLoading, setIsLoading] = useState(false);

    const handleChange = (e) => {
        setFormData((prevData) => ({
            ...prevData,
            [e.target.name]: e.target.value,
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setIsLoading(true);

        try {
            const response = await PostMethodService('register', formData);

            if (response.statusCode === 422) {
                setErrors(response.errors);
                setIsLoading(false);
            } else {
                setIsLoading(false);
                setErrors([])
                setFormData({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                });
                setToastMessage({ message: 'User Created Successfully!', type: 'success' });
                await router.push('login');
            }


        } catch (error) {
            setToastMessage({ message: 'An error occurred while creating the user.', type: 'error' });
            setIsLoading(false);
        }
    };

    const contextValue = {
        formData,
        errors,
        toastMessage,
        handleChange,
        handleSubmit,
        isLoading
    };

    return (
        <RegisterContext.Provider value={contextValue}>
            {children}
        </RegisterContext.Provider>
    );
};
