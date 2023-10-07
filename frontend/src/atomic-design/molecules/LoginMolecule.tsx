import React from "react";
import InputComponent from "@/atomic-design/atoms/InputComponent";
import ButtonComponent from "@/atomic-design/atoms/ButtonComponent";
import {useLoginContext} from "@/contexts/LoginContext";
import Loading from "@/components/Loading";
import Link from "next/link";
import ToastMessage from "@/components/ToastMessage";

const LoginMolecule = () => {
    const {
        formData,
        errors,
        toastMessage,
        handleChange,
        handleLogin,
        isLoading
    } = useLoginContext();

    return (
        <>
            {isLoading ? (
                <Loading/>
            ) : (
                <>
                    <form onSubmit={handleLogin}>
                        <InputComponent
                            label="Email"
                            type="email"
                            name="email"
                            value={formData.email}
                            onChange={handleChange}
                            placeholder="Enter Email"
                            required
                            error={errors.email}
                        />
                        <InputComponent
                            label="Password"
                            type="password"
                            name="password"
                            value={formData.password}
                            onChange={handleChange}
                            placeholder="Enter Password"
                            required
                            error={errors.password}
                        />

                        <ButtonComponent variant="outline-primary" type="submit">
                            Login
                        </ButtonComponent>
                    </form>

                    <ToastMessage message={toastMessage?.message} type={toastMessage?.type}/>

                    <p className="mt-3">
                        {`Don't have an account? `}
                        <Link href={'/register'}
                              className={'text-primary fw-bold text-decoration-none'}>
                            Register
                        </Link>
                    </p>
                </>
            )}

        </>
    );
};

export default LoginMolecule;
