import React from "react";

const ToastMessageComponent = ({ message, type }) => {
    return (
        <div className={`toast toast-${type}`}>
            <p>{message}</p>
        </div>
    );
};

export default ToastMessageComponent;