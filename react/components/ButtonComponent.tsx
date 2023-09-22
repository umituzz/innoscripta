import React from 'react';
import Button from 'react-bootstrap/Button';

const ButtonComponent = ({ variant, type, onClick, children }) => {
    return (
        <Button variant={variant} type={type} onClick={onClick}>
            {children}
        </Button>
    );
};

export default ButtonComponent;
