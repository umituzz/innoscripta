import React, { useState, useEffect } from 'react';
import { Button, Card, Form } from 'react-bootstrap';
import styles from '../styles/PreferenceItem.module.scss';

function PreferenceItem({ title, formId, items, onSubmit, checked }) {
    const [checkedItems, setCheckedItems] = useState({ sourceIds: [] });

    const handleCheckboxChange = (itemId) => {
        const updatedSourceIds = [...checkedItems.sourceIds];
        if (updatedSourceIds.includes(itemId)) {
            updatedSourceIds.splice(updatedSourceIds.indexOf(itemId), 1);
        } else {
            updatedSourceIds.push(itemId);
        }

        setCheckedItems({ sourceIds: updatedSourceIds });
    };

    useEffect(() => {
        if (checked) {
            setCheckedItems({ sourceIds: checked });
        }
    }, [checked]);

    const handleSubmit = (e) => {
        e.preventDefault();
        onSubmit(formId, checkedItems.sourceIds);
    };

    if (!items || items.length === 0) {
        return (
            <Card>
                <Card.Body>
                    <p>{`No data available for ${title}`}</p>
                </Card.Body>
            </Card>
        );
    }

    return (
        <Card>
            <Card.Header>
                <h6>{title}</h6>
            </Card.Header>
            <Card.Body>
                <Form id={formId} onSubmit={handleSubmit}>
                    <div className={styles['checkbox-group']}>
                        {items.map((item) => (
                            <Form.Check
                                key={item.id}
                                type="checkbox"
                                id={`${formId}-${item.id}`}
                                label={item.name}
                                className={styles['form-check']}
                                onChange={() => handleCheckboxChange(item.id)}
                                checked={checkedItems.sourceIds.includes(item.id)}
                            />
                        ))}
                    </div>
                    <Button
                        variant="primary"
                        size="sm"
                        type="submit"
                        className={`mt-2 ${styles['save-button']}`}
                    >
                        Save
                    </Button>
                </Form>
            </Card.Body>
        </Card>
    );
}

export default PreferenceItem;
