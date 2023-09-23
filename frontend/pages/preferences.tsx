import { Container, Col, Row } from 'react-bootstrap';
import HeadComponent from '../components/HeadComponent';
import PreferenceItem from '../components/PreferenceItem';
import {usePreferenceContext} from "../contexts/PreferenceContext";

function Preference() {
    const {
        preferenceData,
        handleSubmit,
        handleCheckAll,
    } = usePreferenceContext();

    return (
        <Container>
            <HeadComponent title={`Preferences`} />
            <Row className="mt-3">
                <Col md={4}>
                    <PreferenceItem
                        title="News Source Preferences"
                        formId="newsSources"
                        items={preferenceData.sources}
                        onSubmit={handleSubmit}
                        onCheckAllChange={handleCheckAll('newsSources')}
                    />
                </Col>

                <Col md={4}>
                    <PreferenceItem
                        title="Author Preferences"
                        formId="authors"
                        items={preferenceData.authors}
                        onSubmit={handleSubmit}
                        onCheckAllChange={handleCheckAll('authors')}
                    />
                </Col>

                <Col md={4}>
                    <PreferenceItem
                        title="Category Preferences"
                        formId="categories"
                        items={preferenceData.categories}
                        onSubmit={handleSubmit}
                        onCheckAllChange={handleCheckAll('categories')}
                    />
                </Col>
            </Row>
        </Container>
    );
}

export default Preference;
