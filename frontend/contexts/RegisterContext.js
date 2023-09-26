import { createContext, useContext, useState } from 'react';
import {useRouter} from "next/router";
import {PostDataService} from "../services/PostDataService";

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

    const handleChange = (e) => {
        setFormData((prevData) => ({
            ...prevData,
            [e.target.name]: e.target.value,
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await PostDataService('register', formData);

            if (response.statusCode === 422) {
                setErrors(response.errors);
            } else {
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
        }
    };

    const contextValue = {
        formData,
        errors,
        toastMessage,
        handleChange,
        handleSubmit,
    };

    return (
        <RegisterContext.Provider value={contextValue}>
            {children}
        </RegisterContext.Provider>
    );
};
