import React from 'react';
import { Container, Col, Row } from 'react-bootstrap';
import HeadComponent from '../components/HeadComponent';
// import PreferenceItem from '../components/PreferenceItem';
// import { usePreferenceContext } from "../contexts/PreferenceContext";

function Preference() {
    // const {
    //     preferenceData,
    //     handleSubmit,
    //     checkedSources,
    //     checkedAuthors,
    //     checkedCategories,
    // } = usePreferenceContext();

    return (
        <Container>
            <HeadComponent title={`Preferences`} />
            {/*<Row className="mt-3">*/}
            {/*    <Col md={12} className="mb-3">*/}
            {/*        <PreferenceItem*/}
            {/*            title="Kaynak Tercihleri"*/}
            {/*            formId="sources"*/}
            {/*            items={preferenceData?.sources}*/}
            {/*            onSubmit={(e) => handleSubmit(e, 'sources')}*/}
            {/*            checked={checkedSources}*/}
            {/*        />*/}
            {/*    </Col>*/}

            {/*    <Col md={12} className="mb-3">*/}
            {/*        <PreferenceItem*/}
            {/*            title="Author Preferences"*/}
            {/*            formId="authors"*/}
            {/*            items={preferenceData?.authors}*/}
            {/*            onSubmit={(e) => handleSubmit(e, 'authors')}*/}
            {/*            checked={checkedAuthors}*/}
            {/*        />*/}
            {/*    </Col>*/}

            {/*    <Col md={12} className="mb-3">*/}
            {/*        <PreferenceItem*/}
            {/*            title="Category Preferences"*/}
            {/*            formId="categories"*/}
            {/*            items={preferenceData?.categories}*/}
            {/*            onSubmit={(e) => handleSubmit(e, 'categories')}*/}
            {/*            checked={checkedCategories}*/}
            {/*        />*/}
            {/*    </Col>*/}
            {/*</Row>*/}
        </Container>
    );
}

export default Preference;
