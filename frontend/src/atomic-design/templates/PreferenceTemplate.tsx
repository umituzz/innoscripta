import React from "react";
import {Container} from "react-bootstrap";
import MainLayout from "@/layouts/MainLayout";
import PreferenceOrganism from "@/atomic-design/organisms/PreferenceOrganism";

const PreferenceTemplate = () => {
    return (
        <MainLayout title={"Preferences"} description={"Preferences Description"}>
            <Container>
                <PreferenceOrganism/>
            </Container>
        </MainLayout>
    )
}

export default PreferenceTemplate;