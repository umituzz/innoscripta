import {Row, Container} from "react-bootstrap";
import Link from "next/link";
import HeadComponent from "../components/HeadComponent";

export default function Home() {

    return (
        <Container className="mt-2 minHeight">
            <HeadComponent title={`Homepage`}/>
            <Row>
                <p>Check out latest articles!</p>
                <Link href="/articles">Articles</Link>
            </Row>
        </Container>
    );
}
