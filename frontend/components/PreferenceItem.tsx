import React from 'react';
import {Button, Card, Form} from 'react-bootstrap';

function PreferenceItem({title, formId, items, onSubmit, onCheckAllChange}) {
    return (<Card>
            <Card.Header>
                <h6>{title}</h6>
            </Card.Header>
            <Card.Body>
                <Form id={formId} onSubmit={onSubmit}>
                    <div className="mb-3">
                        <Form.Check type="checkbox" label={`Select All ${title}`} onChange={onCheckAllChange}/>
                    </div>
                    {items.map((item) => (<Form.Check
                            key={item.id}
                            type="checkbox"
                            id={`${formId}-${item.id}`}
                            label={item.name}
                        />))}
                    <Button variant="primary" size="sm" type="submit" className="mt-2">
                        Save
                    </Button>
                </Form>
            </Card.Body>
        </Card>);
}

export default PreferenceItem;
