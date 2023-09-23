import React from 'react';
import { Navbar, Container } from 'react-bootstrap';
import AuthMenu from './AuthMenu';
import Logo from './Logo';

const Header = () => {
    return (
        <Navbar bg="light" expand="lg" className="sticky-top">
            <Container>
                <Logo />
                <Navbar.Toggle aria-controls="navbarScroll" />
                <AuthMenu />
            </Container>
        </Navbar>
    );
};

export default Header;
