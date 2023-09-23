import {Form, Col, Container, Row} from 'react-bootstrap';
import Link from 'next/link';
import Image from 'next/image';
import {useState} from 'react';
import {useRouter} from 'next/router';
import HeadComponent from '../components/HeadComponent';
import ToastMessage from '../components/ToastMessage';
import InputComponent from "../components/InputComponent";
import ButtonComponent from "../components/ButtonComponent";
import {PostDataService} from "../services/PostDataService";

export default function Register() {
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
        setFormData({...formData, [e.target.name]: e.target.value});
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
                setToastMessage({message: 'User Created Successfully!', type: 'success'});
                await router.push('/login');
            }
        } catch (error) {
            setToastMessage({message: 'An error occurred while creating the user.', type: 'error'});
        }
    };

    return (
        <Container>
            <HeadComponent title={`Register`}/>
            <Row className="mt-5">
                <Col md={6}>
                    <Image src="images/background.svg" alt="bg" className="img-fluid" width={500} height={500}/>
                </Col>
                <Col md={6} className="container">
                    <div className="mb-4">
                        <h3>Registration</h3>
                    </div>
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
                        />
                        <ButtonComponent variant="outline-primary" type="submit">
                            Register
                        </ButtonComponent>
                    </Form>
                    <ToastMessage message={toastMessage?.message} type={toastMessage?.type}/>
                    <p className="mt-3">
                        {`Already have an account? `}
                        <Link href={'/login'} className={'text-primary fw-bold text-decoration-none'}>
                            Login
                        </Link>
                    </p>
                </Col>
            </Row>
        </Container>
    );
}
