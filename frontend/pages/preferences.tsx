import React from 'react';
import { Container, Col, Row } from 'react-bootstrap';
import HeadComponent from '../components/HeadComponent';
import PreferenceItem from '../components/PreferenceItem';
import { usePreferenceContext } from "../contexts/PreferenceContext";
import ToastMessage from "../components/ToastMessage";
import toastMessage from "../components/ToastMessage";

function Preference() {
    const {
        preferenceData,
        handleSubmit,
        checkedSources,
        checkedAuthors,
        checkedCategories,
    } = usePreferenceContext();

    return (
        <Container>
            <HeadComponent title={`Preferences`} />
            <Row className="mt-3">
                <Col md={12} className="mb-3">
                    <PreferenceItem
                        title="Source Preferences"
                        formId="sources"
                        items={preferenceData?.sources}
                        onSubmit={(formId, checkedItems) => handleSubmit(formId, checkedItems)}
                        checked={checkedSources}
                    />
                </Col>
                <Col md={12} className="mb-3">
                    <PreferenceItem
                        title="Author Preferences"
                        formId="authors"
                        items={preferenceData?.authors}
                        onSubmit={(formId, checkedItems) => handleSubmit(formId, checkedItems)}
                        checked={checkedAuthors}
                    />
                </Col>
                <Col md={12} className="mb-3">
                    <PreferenceItem
                        title="Category Preferences"
                        formId="categories"
                        items={preferenceData?.categories}
                        onSubmit={(formId, checkedItems) => handleSubmit(formId, checkedItems)}
                        checked={checkedCategories}
                    />
                </Col>
                <ToastMessage message={toastMessage?.message} type={toastMessage?.type}/>
            </Row>
        </Container>
    );
}

export default Preference;
