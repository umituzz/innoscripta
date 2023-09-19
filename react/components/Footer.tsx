import {Navbar, Container} from "react-bootstrap";
import React from 'react';

const Footer = () => {
    return (
        <Navbar fixed="bottom" bg="light" variant="light" className="mt-2 py-3">
            <Container className="text-center d-block">
                <span className="text-muted">© 2023 Ümit UZ All Right Reserved.</span>
            </Container>
        </Navbar>
    );
};

export default Footer;
