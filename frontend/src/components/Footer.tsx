import { Navbar, Container } from 'react-bootstrap';
import styles from "@/styles/Footer.module.scss"

const Footer = () => {
    return (
        <footer className={styles['fixed-bottom']}>
            <Navbar bg="light" variant="light" className="py-3">
                <Container className="text-center">
                    <span className="text-muted">© 2023 UmitUZ All Right Reserved.</span>
                </Container>
            </Navbar>
        </footer>
    );
};

export default Footer;
