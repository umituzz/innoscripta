import React from "react";
import Link from "next/link";
import {Form} from "react-bootstrap";
import Loading from "@/components/Loading";
import {useRegisterContext} from "@/contexts/RegisterContext";
import InputComponent from "@/atomic-design/atoms/InputComponent";
import ButtonComponent from "@/atomic-design/atoms/ButtonComponent";
import ToastMessageComponent from "@/atomic-design/atoms/ToastMessageComponent";

const RegisterMolecule = () => {
    const {
        formData,
        errors,
        toastMessage,
        handleChange,
        handleSubmit,
        isLoading
    } = useRegisterContext();

    return (
        <>
            {isLoading ? (
                <Loading/>
            ) : (
                <>
                    <Form onSubmit={handleSubmit}>
                        <InputComponent
                            label="Name"
                            type="text"
                            name="name"
                            value={formData.name}
                            onChange={handleChange}
                            placeholder="Enter Name"
                            required
                            error={errors.name}
                        />
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
                        <InputComponent
                            label="Confirm Password"
                            type="password"
                            name="password_confirmation"
                            value={formData.password_confirmation}
                            onChange={handleChange}
                            placeholder="Confirm Password"
                            required
                            error={errors.password}
                        />
                        <ButtonComponent variant="outline-primary" type="submit">
                            Register
                        </ButtonComponent>
                    </Form>
                    <ToastMessageComponent message={toastMessage?.message} type={toastMessage?.type}/>
                    <p className="mt-3">
                        {`Already have an account? `}
                        <Link href={'/login'} className={'text-primary fw-bold text-decoration-none'}>
                            Login
                        </Link>
                    </p>
                </>
            )}
        </>
    )
}

export default RegisterMolecule;