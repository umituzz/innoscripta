import React, { useEffect, useState } from 'react';
import { Container, Col, Row } from 'react-bootstrap';
import HeadComponent from '../components/HeadComponent';
import PreferenceItem from '../components/PreferenceItem';
import { GetDataService } from '../services/GetDataService';
import { setSources, setCategories, setAuthors } from '../stores/actions/preferenceAction';
import { useDispatch, useSelector } from 'react-redux';

function Preference() {
    const dispatch = useDispatch();
    const [toastMessage, setToastMessage] = useState(null);
    const preferenceData = useSelector((state) => state.preferenceReducer);

    useEffect(() => {
        async function fetchData() {
            try {
                const initial = await GetDataService(`articles/preferences`);
                dispatch(setSources(initial?.data.sources));
                dispatch(setCategories(initial?.data.categories));
                dispatch(setAuthors(initial?.data.authors));
            } catch (error) {
                setToastMessage({ message: 'Data Loading Issue', type: 'error' });
            }
        }

        fetchData();
    }, [dispatch]);

    const handleSubmit = (e) => {
        e.preventDefault();
    };

    const handleCheckAll = (formId) => (e) => {
        const checkboxes = document.querySelectorAll(`#${formId} input[type="checkbox"]`);
        checkboxes.forEach((checkbox) => {
            checkbox.checked = e.target.checked;
        });
    };

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
