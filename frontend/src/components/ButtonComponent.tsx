import React from 'react';
import Button from 'react-bootstrap/Button';
import ButtonComponentInterface from '../interfaces/ButtonComponentInterface';

const ButtonComponent = ({ variant, type, children }: ButtonComponentInterface) => {
    return (
        <Button variant={variant} type={type}>
            {children}
        </Button>
    );
};

export default ButtonComponent;
