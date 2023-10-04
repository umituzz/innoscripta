import React from "react";
import {Col, Row} from "react-bootstrap";
import Image from "next/image";
import LoginMolecule from "@/atomic-design/molecules/LoginMolecule";

const LoginOrganism = () => {
    return (
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
                    <LoginMolecule />
                </Row>
            </Col>
        </Row>
    )
}

export default LoginOrganism;