import {Row, Container} from "react-bootstrap";
import Link from "next/link";
import {authCheck} from "../helpers/authHelper";
import HeadComponent from "../components/HeadComponent";

export default function Home() {
    const isLoggedIn = authCheck();

    return (
        <Container className="mt-2 minHeight">
            <HeadComponent title={`Homepage`}/>
            <Row>
                {isLoggedIn ? (
                    <Link href="/articles">Articles</Link>
                ) : (
                    <p>You should login first!</p>
                )}
            </Row>
        </Container>
    );
}
