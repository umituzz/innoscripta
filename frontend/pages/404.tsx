import { Container, Row, Col, Image } from 'react-bootstrap';
import Link from 'next/link';
import HeadComponent from '../components/HeadComponent';

const NotFound = () => {
    return (
        <Container className="mt-5 text-center">
            <HeadComponent title={`404 - Page Not Found`} />
            <Row>
                <Col>
                    <Image
                        src="./images/404.jpg"
                        alt="404 Not Found"
                        fluid
                        width={800}
                        height={800}
                        className="mb-4"
                    />
                    <h1>404 - Page Not Found</h1>
                    <p>Sorry, the page you are looking for does not exist.</p>
                    <Link href="/">
                        Back to Home
                    </Link>
                </Col>
            </Row>
        </Container>
    );
};

export default NotFound;
