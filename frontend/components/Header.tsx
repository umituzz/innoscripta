import React from 'react';
import { Navbar, Container, Nav } from 'react-bootstrap';
import Link from 'next/link';
import { BoxArrowRight } from 'react-bootstrap-icons';
import { useLoginContext } from '../contexts/LoginContext';

const Header = () => {
    const { isAuthenticated, handleLogout } = useLoginContext();

    const authMenu = isAuthenticated ? (
        <>
            <Navbar.Collapse id="navbarScroll">
                <Nav className="me-auto my-2 my-lg-0" navbarScroll>
                    <Link className="nav-link" href="/">
                        Home
                    </Link>
                    <Link className="nav-link" href="/preferences">
                        Preferences
                    </Link>
                </Nav>
            </Navbar.Collapse>

            <Nav className="my-2 my-lg-0" navbarScroll onClick={handleLogout}>
                <Link href="/" className="nav-link">
                    <BoxArrowRight className="pb-1" size={22} />
                </Link>
            </Nav>
        </>
    ) : (
        <>
            <Nav className="ms-auto my-2 my-lg-0" navbarScroll>
                <Link href="/login" className="nav-link">
                    Login
                </Link>
            </Nav>
            <Nav className="my-2 my-lg-0" navbarScroll>
                <Link href="/register" className="nav-link">
                    Register
                </Link>
            </Nav>
        </>
    );

    return (
        <Navbar bg="light" expand="lg" className="sticky-top">
            <Container>
                <Navbar.Brand>Logo</Navbar.Brand>
                <Navbar.Toggle aria-controls="navbarScroll" />
                {authMenu}
            </Container>
        </Navbar>
    );
};

export default Header;
