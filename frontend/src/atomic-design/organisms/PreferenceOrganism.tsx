import React from "react";
import {Row} from "react-bootstrap";
import PreferenceItemMolecule from "@/atomic-design/molecules/PreferenceItemMolecule";
import ToastMessage from "@/components/ToastMessage";
import {usePreferenceContext} from "@/contexts/PreferenceContext";

const PreferenceOrganism = () => {
    const {
        preferenceData,
        handleSubmit,
        toastMessage,
        checkedSources,
        checkedAuthors,
        checkedCategories,
    } = usePreferenceContext();

    return (
        <>
            <Row className="mt-3">

                <PreferenceItemMolecule
                    title="Source Preferences"
                    formId="sources"
                    items={preferenceData?.sources}
                    onSubmit={(formId, checkedItems) => handleSubmit(formId, checkedItems)}
                    checked={checkedSources}
                />

                <PreferenceItemMolecule
                    title="Author Preferences"
                    formId="authors"
                    items={preferenceData?.authors}
                    onSubmit={(formId, checkedItems) => handleSubmit(formId, checkedItems)}
                    checked={checkedAuthors}
                />

                <PreferenceItemMolecule
                    title="Category Preferences"
                    formId="categories"
                    items={preferenceData?.categories}
                    onSubmit={(formId, checkedItems) => handleSubmit(formId, checkedItems)}
                    checked={checkedCategories}
                />
            </Row>

            <ToastMessage message={toastMessage?.message} type={toastMessage?.type}/>
        </>
    )
}

export default PreferenceOrganism;