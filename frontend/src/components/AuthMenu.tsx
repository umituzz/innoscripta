import React from 'react';
import { Nav, Button, Dropdown } from 'react-bootstrap';
import Link from 'next/link';
import { BoxArrowRight } from 'react-bootstrap-icons';
import { useLoginContext } from '@/contexts/LoginContext';

const AuthMenu = () => {
    const { isAuthenticated, authUser, handleLogout } = useLoginContext();

    return (
        <Nav className="ms-auto my-2 my-lg-0" navbarScroll>
            {isAuthenticated ? (
                <Dropdown className="d-none d-lg-inline">
                    <Dropdown.Toggle variant="link" id="user-dropdown" className="user-dropdown-toggle">
                        <span className="user-name">{authUser ? authUser.name : 'Guest'}</span>
                    </Dropdown.Toggle>
                    <Dropdown.Menu className="user-dropdown-menu">
                        <Dropdown.Item>
                            <Link href="/user/preferences" className="nav-link">Preferences</Link>
                        </Dropdown.Item>
                    </Dropdown.Menu>
                    <Button variant="link" onClick={handleLogout} className="logout-button">
                        <BoxArrowRight size={22} />
                    </Button>
                </Dropdown>
            ) : (
                <>
                    <Link href="/login" className="nav-link">
                        Login
                    </Link>
                    <Link href="/register" className="nav-link">
                        Register
                    </Link>
                </>
            )}
        </Nav>
    )
};

export default AuthMenu;
