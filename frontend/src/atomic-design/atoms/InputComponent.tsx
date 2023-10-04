import React from "react";
import Form from "react-bootstrap/Form";

const InputComponent = ({ label, type, name, value, onChange, placeholder, required, error }) => {
    return (
        <Form.Group className="mb-3" controlId={`formBasic${name}`}>
            <Form.Label className="text-center">
                {label} {required && <span className="text-danger">*</span>}
            </Form.Label>
            <Form.Control
                type={type}
                name={name}
                value={value}
                onChange={onChange}
                placeholder={placeholder}
                required={required}
            />
            {error && <p className="text-danger pt-1">{error}</p>}
        </Form.Group>
    );
};

export default InputComponent;