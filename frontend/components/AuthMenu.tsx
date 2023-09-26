import React from 'react';
import { Nav } from 'react-bootstrap';
import Link from 'next/link';
import { BoxArrowRight } from 'react-bootstrap-icons';
import { useLoginContext } from '../contexts/LoginContext';

const AuthMenu = () => {
    const { isAuthenticated, handleLogout } = useLoginContext();

    if (isAuthenticated) {
        return (
            <>
                <Nav className="me-auto my-2 my-lg-0" navbarScroll>
                    <Link className="nav-link" href="/preferences">
                        Preferences
                    </Link>
                </Nav>
                <Nav className="my-2 my-lg-0" navbarScroll onClick={handleLogout}>
                    <Link href="/" className="nav-link">
                        <BoxArrowRight className="pb-1" size={22} />
                    </Link>
                </Nav>
            </>
        );
    } else {
        return (
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
    }
};

export default AuthMenu;
