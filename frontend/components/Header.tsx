import {Navbar, Container, Nav} from "react-bootstrap";
import Link from "next/link";
import {useRouter} from "next/router";
import {useDispatch, useSelector} from "react-redux";
import {BoxArrowRight} from "react-bootstrap-icons";
import {logout} from "../stores/actions/authAction";
import {PostDataService} from "../services/PostDataService";
import {useState} from "react";

const Header = () => {
    const router = useRouter();
    const dispatch = useDispatch();
    const isAuthenticated = useSelector((state) => state.authReducer.isAuthenticated);

    let menu;

    const handleLogout = async () => {
        try {
            await PostDataService('logout');
            localStorage.removeItem('token');
            dispatch(logout())
            await router.push('/login')
        } catch (error) {
            console.error('Logout error:', error);
        }
    };

    if (!isAuthenticated) {
        menu = (
            <>
                <Nav className="ms-auto my-2 my-lg-0" navbarScroll>
                    <Link href={"/login"} className={"nav-link"}>
                        Login
                    </Link>
                </Nav>
                <Nav className="my-2 my-lg-0" navbarScroll>
                    <Link href={"/register"} className={"nav-link"}>
                        Register
                    </Link>
                </Nav>
            </>
        )
    } else {
        menu = (
            <>
                <Navbar.Collapse id="navbarScroll">
                    <Nav className="me-auto my-2 my-lg-0" navbarScroll>
                        <Link className={"nav-link"} href={'/'}>
                            Home
                        </Link>
                    </Nav>
                </Navbar.Collapse>

                <Nav className="my-2 my-lg-0" navbarScroll
                     onClick={handleLogout}
                >
                    <Link href={'/'} className={"nav-link"}>
                        <BoxArrowRight className="pb-1" size={22}/>
                    </Link>
                </Nav>
            </>
        )
    }

    return (
        <Navbar bg="light" expand="lg" className="sticky-top">
            <Container>
                <Navbar.Brand>Logo</Navbar.Brand>
                <Navbar.Toggle aria-controls="navbarScroll"/>
                {menu}
            </Container>
        </Navbar>
    );
}

export default Header;
