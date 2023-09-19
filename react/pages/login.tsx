import {Button, Form, Col, Container, Row} from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";
import {useEffect, useState} from "react";
import {useRouter} from "next/router";
import {CreateData} from "../services/DataCreateService";
import {useDispatch, useSelector} from "react-redux";
import {LoadListData} from "../services/DataListService";
import {setOrders} from "../stores/actions/orderAction";
import {login} from "../stores/actions/authAction";

export default function Login() {
    const router = useRouter();
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
            const data = await CreateData('login', formData)

            if (data.token != 'undefined') {

                dispatch(login(data.token))

                localStorage.setItem("token", JSON.stringify(data.token));

                alert("Kullanıcı girişi başarılı");

                setFormData({
                    first_name: "",
                    last_name: "",
                    email: "",
                    password: "",
                    password_confirmation: "",
                });

                await router.push('/')
            } else {
                console.error("Undefined Token");
            }

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
                        <h3>Login</h3>
                    </div>
                    <Row className="justify-content-center">
                        <Form onSubmit={handleSubmit}>
                            {/*{errorMessage && <Alert variant="danger">{errorMessage}</Alert>}*/}
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
                                    required
                                />
                                {/*{vError && <p className="text-danger pt-1">{vError.email}</p>}*/}
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
                                    required
                                />
                                {/*{vError && <p className="text-danger pt-1">{vError.password}</p>}*/}
                            </Form.Group>
                            <Button variant="outline-primary" type="submit"
                                // disabled={loading}
                            >
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