import React from 'react';
import {ScrollView} from "react-native";
import ArticleListComponent from "../components/ArticleListComponent";

export default function HomeScreen() {

    return (
        <ScrollView>
            <ArticleListComponent />
        </ScrollView>
    );
}


