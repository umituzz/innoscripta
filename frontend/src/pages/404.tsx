import React from "react";
import { Container, Row, Col, Image } from 'react-bootstrap';
import Link from 'next/link';
import MainLayout from "@/layouts/MainLayout";

const NotFound = () => {
    return (
        <MainLayout title={"Not Found"} description={"Not Found Description"}>
            <Container className="mt-5 text-center">
                <Row>
                    <Col md={12}>
                        <h1>404 - Page Not Found</h1>
                        <p>Sorry, the page you are looking for does not exist.</p>
                        <Link href="/">
                            Back to Home
                        </Link>
                    </Col>
                    <Col md={12}>
                        <Image
                            src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg?size=626&ext=jpg&ga=GA1.1.1943757630.1695505381&semt=ais"
                            alt="404 Not Found"
                            fluid
                            width={700}
                            height={700}
                            className="mb-4"
                        />

                    </Col>
                </Row>
            </Container>
        </MainLayout>
    );
};

export default NotFound;
