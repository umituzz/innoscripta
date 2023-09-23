import {Col, Container, Form, Row} from 'react-bootstrap';
import Link from 'next/link';
import Image from 'next/image';
import HeadComponent from '../components/HeadComponent';
import ToastMessage from '../components/ToastMessage';
import InputComponent from "../components/InputComponent";
import ButtonComponent from "../components/ButtonComponent";
import {useLoginContext} from "../contexts/LoginContext";

export default function Login() {
    const {
        formData,
        errors,
        toastMessage,
        handleChange,
        handleSubmit,
    } = useLoginContext();

    return (<Container>
            <HeadComponent title={`Login`}/>
            <Row className="mt-5">
                <Col md={6}>
                    <Image src="images/background.svg" alt="bg" className="img-fluid" width={500} height={500}/>
                </Col>
                <Col md={6} className="container">
                    <div className="mb-4">
                        <h3>Login</h3>
                    </div>
                    <Row className="justify-content-center">
                        <Form onSubmit={handleSubmit}>
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
                            <Link href={'/register'} className={'text-primary fw-bold text-decoration-none'}>
                                Register
                            </Link>
                        </p>
                    </Row>
                </Col>
            </Row>
        </Container>);
}
