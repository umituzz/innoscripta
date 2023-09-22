import { Navbar, Container } from "react-bootstrap";
import React from 'react';

const Footer = () => {
    return (
        <footer>
            <Navbar bg="light" variant="light" className="py-3">
                <Container className="text-center">
                    <span className="text-muted">© 2023 Ümit UZ All Right Reserved.</span>
                </Container>
            </Navbar>
        </footer>
    );
};

export default Footer;
