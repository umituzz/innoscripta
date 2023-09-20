import {Button, Form, Col, Container, Row} from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";
import {useState} from "react";
import {useRouter} from "next/router";
import {CreateData} from "../services/DataCreateService";
import {useDispatch} from "react-redux";
import {login} from "../stores/actions/authAction";
import {toast} from 'react-toastify';

export default function Login() {
    const router = useRouter();
    const [errors, setErrors] = useState({});
    const [formData, setFormData] = useState({
        email: "",
        password: "",
    });

    const handleChange = (e) => {
        setFormData({...formData, [e.target.name]: e.target.value});
    };

    const dispatch = useDispatch();

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await CreateData('login', formData);

            if (response.statusCode == 422) {
                setErrors(response.errors)
            } else {
                const token = response.data.token;

                if (token != undefined) {
                    dispatch(login(token));
                    localStorage.setItem("token", JSON.stringify(token));
                    setFormData({
                        email: "",
                        password: "",
                    });
                    toast.success('Login Succesfully', {
                        position: toast.POSITION.TOP_RIGHT
                    });
                    await router.push('/');
                } else {
                    console.error("Undefined Token");
                }
            }
        } catch (error) {
            toast.error("An error occurred while creating the order.");
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
                        <h3>Login</h3>
                    </div>
                    <Row className="justify-content-center">
                        <Form onSubmit={handleSubmit}>
                            <Form.Group className="mb-3" controlId="formBasicEmail">
                                <Form.Label className="text-center">
                                    Email <span className="text-danger">*</span>
                                </Form.Label>
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
                                <Form.Label>
                                    Password <span className="text-danger">*</span>
                                </Form.Label>
                                <Form.Control
                                    type="password"
                                    name="password"
                                    value={formData.password}
                                    onChange={handleChange}
                                    placeholder="Enter Password"
                                />
                                {errors.password && <p className="text-danger pt-1">{errors.password}</p>}
                            </Form.Group>
                            <Button variant="outline-primary" type="submit">
                                Login
                            </Button>
                        </Form>

                        <p className="mt-3">
                            {`Don't have an account? `}
                            <Link href={"/register"} className={"text-primary fw-bold text-decoration-none"}>
                                Register
                            </Link>
                        </p>
                    </Row>
                </Col>
            </Row>
        </Container>
    )
}
