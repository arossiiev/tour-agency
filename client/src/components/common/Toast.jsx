

import React, {useEffect} from "react";
import {ToastContainer, toast} from "react-toastify";
import 'react-toastify/dist/ReactToastify.css';
import {useSelector} from "react-redux";
import {getToasts} from "../../selectors";
import {useNavigate} from "react-router";




function Toast()
{
    const navigate = useNavigate();
    let toastMessage = useSelector(getToasts);


    useEffect(()=>{

        if (toastMessage !== null) {

            if (toastMessage.type === 'success') {
                toast.success(toastMessage.message, {onClose: ()=>{
                        navigate("/");
                    }})
            }
            else if (toastMessage.type === 'error') {
                toast.error(toastMessage.message)
            }
        }

    }, [toastMessage, navigate]);


    return ( <ToastContainer position="bottom-right" autoClose={3000}/>)


}

export default Toast;