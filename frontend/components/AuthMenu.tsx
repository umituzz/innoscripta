import React from 'react';
import { Nav, Button } from 'react-bootstrap';
import Link from 'next/link';
import { BoxArrowRight } from 'react-bootstrap-icons';
import { useLoginContext } from '../contexts/LoginContext';

const AuthMenu = () => {
    const { isAuthenticated, handleLogout } = useLoginContext();

    return (
        <Nav className="ms-auto my-2 my-lg-0" navbarScroll>
            {isAuthenticated ? (
                <>
                    <Link href="/preferences" className="nav-link">
                        Preferences
                    </Link>
                    <Button variant="link" onClick={handleLogout}>
                        <BoxArrowRight className="pb-1" size={22} />
                    </Button>
                </>
            ) : (
                <>
                    <Link href="/register" className="nav-link">
                        Register
                    </Link>
                    <Link href="/login" className="nav-link">
                        Login
                    </Link>
                </>
            )}
        </Nav>
    )
};

export default AuthMenu;
