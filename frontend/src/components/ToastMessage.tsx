import { useEffect } from 'react';
import { toast } from 'react-toastify';

function ToastMessage({ message, type }) {
    useEffect(() => {
        if (message) {
            if (type === 'success') {
                toast.success(message, {
                    position: toast.POSITION.TOP_RIGHT,
                });
            } else if (type === 'error') {
                toast.error(message, {
                    position: toast.POSITION.TOP_RIGHT,
                });
            }
        }
    }, [message, type]);

    return null;
}

export default ToastMessage;
