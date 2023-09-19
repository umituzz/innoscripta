import {Alert, Button, Col, Container, Form, Row} from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";
import {useState} from "react";
import {useRouter} from "next/router";
import {CreateData} from "../services/DataCreateService";

export default function Register() {
    const router = useRouter();
    const [formData, setFormData] = useState({
        first_name: "",
        last_name: "",
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
            await CreateData('register', formData)

            alert("Kullanıcı kaydı başarılı");

            setFormData({
                first_name: "",
                last_name: "",
                email: "",
                password: "",
                password_confirmation: "",
            });

            await router.push('/login')
        } catch (error) {
            console.error("API isteği hatası:", error);
        }
    };

    return (
        <Container>
            <Row className="mt-5">
                <Col md={6}>
                    <Image src="images/background.svg" alt="bg" className="img-fluid" width={500} height={500}/>
                </Col>
                <Col md={6} className="container">
                    <div className="mb-4">
                        <h3>Registration</h3>
                    </div>
                    <Form onSubmit={handleSubmit}>
                        <Form.Group className="mb-3" controlId="formBasicFirstName">
                            <Form.Label className="text-center">First Name <span
                                className="text-danger">*</span></Form.Label>
                            <Form.Control
                                type="text"
                                name="first_name"
                                value={formData.first_name}
                                onChange={handleChange}
                                placeholder="Enter First Name"
                                required
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="formBasicLastName">
                            <Form.Label className="text-center">Last Name <span
                                className="text-danger">*</span></Form.Label>
                            <Form.Control
                                type="text"
                                name="last_name"
                                value={formData.last_name}
                                onChange={handleChange}
                                placeholder="Enter Last Name"
                                required
                            />
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
                                required
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="formBasicPassword">
                            <Form.Label>Password <span className="text-danger">*</span></Form.Label>
                            <Form.Control
                                type="password"
                                name="password"
                                value={formData.password}
                                onChange={handleChange}
                                placeholder="Enter Password"
                                required
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="formBasicConfirmPassword">
                            <Form.Label>Confirm Password <span className="text-danger">*</span></Form.Label>
                            <Form.Control
                                type="password"
                                name="password_confirmation"
                                value={formData.password_confirmation}
                                onChange={handleChange}
                                placeholder="Confirm Password"
                                required
                            />
                        </Form.Group>
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
