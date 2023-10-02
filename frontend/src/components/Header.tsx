import { Navbar, Container, Nav } from 'react-bootstrap';
import Link from "next/link";
import AuthMenu from '@/components/AuthMenu';
import Logo from '@/components/Logo';

const Header = () => {
    return (
        <Navbar bg="light" expand="lg" className="sticky-top">
            <Container>
                <Logo />
                <Navbar.Toggle aria-controls="navbarScroll" />
                <Navbar.Collapse id="navbarScroll" role="navigation">
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
