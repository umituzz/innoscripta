import {Button, Col, Container, Form, Row} from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";
import {useState} from "react";
import {useRouter} from "next/router";
import {CreateData} from "../services/DataCreateService";
import {toast} from 'react-toastify';
import HeadComponent from "../components/HeadComponent";

export default function Register() {
    const router = useRouter();
    const [errors, setErrors] = useState({});
    const [formData, setFormData] = useState({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
    });

    const handleChange = (e) => {
        setFormData({...formData, [e.target.name]: e.target.value});
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {

            const response = await CreateData('register', formData)

            if (response.statusCode == 422) {
                setErrors(response.errors)
            } else {
                setFormData({
                    name: "",
                    email: "",
                    password: "",
                    password_confirmation: "",
                });
                toast.success('User Created Successfully!', {
                    position: toast.POSITION.TOP_RIGHT
                });
                await router.push('/login')
            }

        } catch (error) {
            console.error("API Request Error:", error);
        }
    };

    return (
        <Container>
            <HeadComponent title={`Register`} />
            <Row className="mt-5">
                <Col md={6}>
                    <Image src="images/background.svg" alt="bg" className="img-fluid" width={500} height={500}/>
                </Col>
                <Col md={6} className="container">
                    <div className="mb-4">
                        <h3>Registration</h3>
                    </div>
                    <Form onSubmit={handleSubmit}>
                        <Form.Group className="mb-3" controlId="formBasicName">
                            <Form.Label className="text-center">Name <span
                                className="text-danger">*</span></Form.Label>
                            <Form.Control
                                type="text"
                                name="name"
                                value={formData.name}
                                onChange={handleChange}
                                placeholder="Enter Name"
                            />
                            {errors.name && <p className="text-danger pt-1">{errors.name}</p>}
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="formBasicEmail">
                            <Form.Label className="text-center">Email <span
                                className="text-danger">*</span></Form.Label>
                            <Form.Control
                                type="email"
                                name="email"
                                value={formData.email}
                                onChange={handleChange}
                                placeholder="Enter Email"
                            />
                            {errors.email && <p className="text-danger pt-1">{errors.email}</p>}
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="formBasicPassword">
                            <Form.Label>Password <span className="text-danger">*</span></Form.Label>
                            <Form.Control
                                type="password"
                                name="password"
                                value={formData.password}
                                onChange={handleChange}
                                placeholder="Enter Password"
                            />
                            {errors.password && <p className="text-danger pt-1">{errors.password}</p>}
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="formBasicConfirmPassword">
                            <Form.Label>Confirm Password <span className="text-danger">*</span></Form.Label>
                            <Form.Control
                                type="password"
                                name="password_confirmation"
                                value={formData.password_confirmation}
                                onChange={handleChange}
                                placeholder="Confirm Password"
                            />
                        </Form.Group>
                        {errors.password && <p className="text-danger pt-1">{errors.password}</p>}
                        <Button variant="outline-primary" type="submit">Register</Button>
                    </Form>
                    <p className="mt-3">
                        {`Already have an account? `}
                        <Link href={"/login"} className={"text-primary fw-bold text-decoration-none"}>Login</Link>
                    </p>
                </Col>
            </Row>
        </Container>
    );
}
