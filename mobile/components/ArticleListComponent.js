import React, { useState } from 'react';
import { FlatList, StyleSheet, TouchableOpacity } from 'react-native';
import { ButtonGroup } from 'react-native-elements';
import ArticleItemComponent from './ArticleItemComponent';
import { calculateTotalPages, paginateArray } from "../helpers/PaginationHelper";
import { useNavigation } from '@react-navigation/native';

export default function ArticleListComponent() {
    const articles = [
        {
            id: 1,
            title: 'Article 1 Title',
            content: 'Article 1 Content',
        },
        {
            id: 2,
            title: 'Article 2 Title',
            content: 'Article 2 Content',
        },
        {
            id: 3,
            title: 'Article 3 Title',
            content: 'Article 3 Content',
        },
        {
            id: 4,
            title: 'Article 4 Title',
            content: 'Article 4 Content',
        },
        {
            id: 5,
            title: 'Article 5 Title',
            content: 'Article 5 Content',
        },
    ];

    const navigation = useNavigation();
    const articlesPerPage = 2;
    const [currentPage, setCurrentPage] = useState(0);
    const totalPages = calculateTotalPages(articles, articlesPerPage);

    const updatePage = (selectedIndex) => {
        setCurrentPage(selectedIndex);
    };

    const renderArticleItem = ({ item }) => (
        <TouchableOpacity
            onPress={() => navigation.navigate('ArticleDetailScreen', { article: item })}
        >
            <ArticleItemComponent
                title={item.title}
                content={item.content}
            />
        </TouchableOpacity>
    );

    return (
        <>
            <FlatList
                data={paginateArray(articles, articlesPerPage, currentPage)}
                renderItem={renderArticleItem}
                keyExtractor={item => item.id.toString()}
            />
            <ButtonGroup
                onPress={updatePage}
                selectedIndex={currentPage}
                buttons={Array.from({ length: totalPages }, (_, i) => `Page ${i + 1}`)}
                containerStyle={styles.buttonGroup}
            />
        </>
    );
}

const styles = StyleSheet.create({
    buttonGroup: {
        marginTop: 10,
    },
});
