import {Row, Container} from "react-bootstrap";
import {authCheck} from "../helpers/authHelper";

export default function Home() {
    let display;

    if (!authCheck()) {
        display = 'You should login first!'
    } else {
        display = 'You logged in!'
    }

    return (
        <Container className="mt-2 minHeight">
            <Row>
                {display}
            </Row>
        </Container>
    )
}