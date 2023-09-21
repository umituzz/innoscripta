import {Row, Container} from "react-bootstrap";
import Link from "next/link";
import {authCheck} from "../helpers/authHelper";
import HeadComponent from "../components/HeadComponent";

export default function Home() {
    let display;

    if (!authCheck()) {
        display = 'You should login first!'
    } else {
        display = (
            <>
                <Link href="articles">Articles</Link>
            </>
        )
    }

    return (
        <Container className="mt-2 minHeight">
            <HeadComponent title={`Homepage`} />
            <Row>
                {display}
            </Row>
        </Container>
    )
}