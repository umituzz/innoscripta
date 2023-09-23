import {Col, Container, Form, Row} from 'react-bootstrap';
import Link from 'next/link';
import Image from 'next/image';
import {useState} from 'react';
import {useRouter} from 'next/router';
import {useDispatch} from 'react-redux';
import {login} from '../stores/actions/authAction';
import HeadComponent from '../components/HeadComponent';
import ToastMessage from '../components/ToastMessage';
import InputComponent from "../components/InputComponent";
import ButtonComponent from "../components/ButtonComponent";
import {PostDataService} from "../services/PostDataService";

export default function Login() {
    const router = useRouter();
    const [errors, setErrors] = useState({});
    const [formData, setFormData] = useState({
        email: '', password: '',
    });
    const [toastMessage, setToastMessage] = useState(null);

    const handleChange = (e) => {
        setFormData({...formData, [e.target.name]: e.target.value});
    };

    const dispatch = useDispatch();

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await PostDataService('login', formData);

            if (response.statusCode === 422) {
                setErrors(response.errors);
            } else {
                const token = response.data.token;

                if (token) {
                    dispatch(login(token));
                    localStorage.setItem('token', JSON.stringify(token));
                    setFormData({email: '', password: ''});
                    setToastMessage({message: 'Login Successfully', type: 'success'});
                    await router.push('/');
                } else {
                    setToastMessage({message: 'Undefined Token', type: 'error'});
                }
            }
        } catch (error) {
            setToastMessage({message: 'An error occurred while logging in', type: 'error'});
        }
    };

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
