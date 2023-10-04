import PreferenceTemplate from "@/atomic-design/templates/PreferenceTemplate";
import withAuth from "@/utils/withAuth";

function Preference() {
    return (
        <PreferenceTemplate />
    );
}

export default withAuth(Preference);
