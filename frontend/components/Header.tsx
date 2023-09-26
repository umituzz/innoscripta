import React from 'react';
import {Navbar, Container, Nav} from 'react-bootstrap';
import AuthMenu from './AuthMenu';
import Logo from './Logo';
import Link from "next/link";
import {BoxArrowRight} from "react-bootstrap-icons";

const Header = () => {
    return (
        <Navbar bg="light" expand="lg" className="sticky-top">
            <Container>
                <Logo />
                <Navbar.Toggle aria-controls="navbarScroll" />
                <Navbar.Collapse id="navbarScroll">
                    <Nav className="me-auto my-2 my-lg-0" style={{ maxHeight: '100px' }} navbarScroll>
                        <Link className="nav-link me-auto my-2 my-lg-0" href="/">
                            Home
                        </Link>
                    </Nav>
                    <AuthMenu />
                </Navbar.Collapse>
            </Container>
        </Navbar>
    );
};

export default Header;
