import {Row, Container} from "react-bootstrap";
import {authCheck} from "../helpers/authHelper";
import Link from "next/link";

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
            <Row>
                {display}
            </Row>
        </Container>
    )
}