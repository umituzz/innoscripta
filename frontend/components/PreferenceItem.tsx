import React from 'react';
import { Button, Card, Form } from 'react-bootstrap';
import styles from '../styles/PreferenceItem.module.scss';

function PreferenceItem({ title, formId, items, onSubmit, onCheckAllChange }) {
    return (
        <Card>
            <Card.Header>
                <h6>{title}</h6>
            </Card.Header>
            <Card.Body>
                <Form id={formId} onSubmit={onSubmit}>
                    <div className="mb-3">
                        <Form.Check type="checkbox" label={`Select All ${title}`} onChange={onCheckAllChange}/>
                    </div>
                    <div className={styles['checkbox-group']}>
                        {items.map((item) => (
                            <Form.Check
                                key={item.id}
                                type="checkbox"
                                id={`${formId}-${item.id}`}
                                label={item.name}
                                className={styles['form-check']}
                            />
                        ))}
                    </div>
                    <Button variant="primary" size="sm" type="submit" className={`mt-2 ${styles['save-button']}`}>
                        Save
                    </Button>
                </Form>
            </Card.Body>
        </Card>
    );
}

export default PreferenceItem;
