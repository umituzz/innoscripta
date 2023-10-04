import MainLayout from "@/layouts/MainLayout";
import {Col, Container, Form, Row} from "react-bootstrap";
import Image from "next/image";
import Loading from "@/components/Loading";
import InputComponent from "@/components/InputComponent";
import ButtonComponent from "@/components/ButtonComponent";
import ToastMessage from "@/components/ToastMessage";
import Link from "next/link";
import React from "react";
import {useLoginContext} from "@/contexts/LoginContext";

const LoginTemplate = () => {
    const {
        formData,
        errors,
        toastMessage,
        handleChange,
        handleLogin,
        isLoading
    } = useLoginContext();

    return (
        <MainLayout title={"Login"} description={"Login Description"}>
            <Container>
                <Row className="mt-5">
                    <Col md={6}>
                        <Image
                            src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg?size=626&ext=jpg&ga=GA1.2.1943757630.1695505381&semt=sph"
                            alt="bg"
                            className="img-fluid"
                            width={500}
                            height={500}
                        />
                    </Col>
                    <Col md={6} className="container">
                        <div className="mb-4">
                            <h3>Login</h3>
                        </div>
                        <Row className="justify-content-center">
                            {isLoading ? (
                                <Loading/>
                            ) : (
                                <>
                                    <Form onSubmit={handleLogin}>
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
                                    </Form>
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
                        </Row>
                    </Col>
                </Row>
            </Container>
        </MainLayout>
    )
}

export default LoginTemplate;