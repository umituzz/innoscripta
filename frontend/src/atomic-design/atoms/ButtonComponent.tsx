import React from "react";

const ButtonComponent = ({ variant, type, children }) => {
    return (
        <button type={type} className={`btn btn-${variant}`}>
            {children}
        </button>
    );
};

export default ButtonComponent;