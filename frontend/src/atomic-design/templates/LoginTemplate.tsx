import MainLayout from "@/layouts/MainLayout";
import {Container} from "react-bootstrap";
import React from "react";
import LoginOrganism from "@/atomic-design/organisms/LoginOrganism";

const LoginTemplate = () => {
    return (
        <MainLayout title={"Login"} description={"Login Description"}>
            <Container>
                <LoginOrganism />
            </Container>
        </MainLayout>
    )
}

export default LoginTemplate;