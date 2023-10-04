import React from "react";
import {Container} from "react-bootstrap";
import MainLayout from "@/layouts/MainLayout";
import NotFoundOrganism from "@/atomic-design/organisms/NotFoundOrganism";

const NotFoundTemplate = () => {
    return (
        <MainLayout title={"Not Found"} description={"Not Found Description"}>
            <Container className="mt-5 text-center">
                <NotFoundOrganism />
            </Container>
        </MainLayout>
    )
}

export default NotFoundTemplate;