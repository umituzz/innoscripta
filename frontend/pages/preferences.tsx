import React from 'react';
import { Container, Col, Row } from 'react-bootstrap';
import HeadComponent from '../components/HeadComponent';
import PreferenceItem from '../components/PreferenceItem';
import { usePreferenceContext } from "../contexts/PreferenceContext";

function Preference() {
    const {
        preferenceData,
        handleSubmit,
        handleCheckAll,
        checkedSources,
        checkedAuthors,
        checkedCategories,
    } = usePreferenceContext();

    return (
        <Container>
            <HeadComponent title={`Tercihler`} />
            <Row className="mt-3">
                <Col md={12} className="mb-3">
                    <PreferenceItem
                        title="Kaynak Tercihleri"
                        formId="sources"
                        items={preferenceData.sources}
                        onSubmit={handleSubmit}
                        onCheckAllChange={handleCheckAll('sources')}
                        checked={checkedSources}
                    />
                </Col>

                <Col md={12} className="mb-3">
                    <PreferenceItem
                        title="Yazar Tercihleri"
                        formId="authors"
                        items={preferenceData.authors}
                        onSubmit={handleSubmit}
                        onCheckAllChange={handleCheckAll('authors')}
                        checked={checkedAuthors}
                    />
                </Col>

                <Col md={12} className="mb-3">
                    <PreferenceItem
                        title="Kategori Tercihleri"
                        formId="categories"
                        items={preferenceData.categories}
                        onSubmit={handleSubmit}
                        onCheckAllChange={handleCheckAll('categories')}
                        checked={checkedCategories}
                    />
                </Col>
            </Row>
        </Container>
    );
}

export default Preference;
