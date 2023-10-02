import React, {useEffect} from 'react';
import {Col, Container, Row} from 'react-bootstrap';
import PreferenceItem from '@/components/PreferenceItem';
import {usePreferenceContext} from "@/contexts/PreferenceContext";
import ToastMessage from "@/components/ToastMessage";
import Layout from "@/components/Layout";
import withAuth from "@/utils/withAuth";

function Preference() {
    const preferenceContext = usePreferenceContext();

    useEffect(() => {
        if (!preferenceContext.preferenceData) {
            preferenceContext.fetchPreferenceData();
        }
    }, []);

    const {
        preferenceData,
        handleSubmit,
        toastMessage,
        checkedSources,
        checkedAuthors,
        checkedCategories,
    } = preferenceContext;


    return (
        <Layout title={"Preferences"} description={"Preferences Description"}>
            <Container>
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
                </Row>
                <ToastMessage message={toastMessage?.message} type={toastMessage?.type}/>
            </Container>
        </Layout>
    );
}

export default withAuth(Preference);
