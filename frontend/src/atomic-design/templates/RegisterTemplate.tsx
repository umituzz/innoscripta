import MainLayout from "@/layouts/MainLayout";
import {Container} from "react-bootstrap";
import React from "react";
import RegisterOrganism from "@/atomic-design/organisms/RegisterOrganism";

const RegisterTemplate = () => {
    return (
        <MainLayout title={"Register"} description={"Register Description"}>
            <Container>
                <RegisterOrganism />
            </Container>
        </MainLayout>
    )
}

export default RegisterTemplate;