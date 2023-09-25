import React from 'react';
import Button from 'react-bootstrap/Button';

const ButtonComponent = ({ variant, type, children }) => {
    return (
        <Button variant={variant} type={type}>
            {children}
        </Button>
    );
};

export default ButtonComponent;
