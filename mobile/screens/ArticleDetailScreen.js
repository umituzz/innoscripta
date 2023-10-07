import React from 'react';
import {View, Text, StyleSheet, ScrollView, TouchableOpacity} from 'react-native';
import Icon from 'react-native-vector-icons/FontAwesome';

export default function ArticleDetailScreen({ route, navigation }) {
    const { article } = route.params;

    return (
        <ScrollView style={styles.container}>
            <TouchableOpacity
                onPress={() => navigation.goBack()}
                style={styles.backButton}
            >
                <Icon name="arrow-left" size={30} color="#000" />
            </TouchableOpacity>
            <View style={styles.card}>
                <Text style={styles.title}>{article.title}</Text>
                <Text style={styles.content}>{article.content}</Text>
            </View>
        </ScrollView>
    );
}

const styles = StyleSheet.create({
    backButton: {
        alignSelf: 'flex-start',
        padding: 10,
    },
    container: {
        flex: 1,
        backgroundColor: '#f0f0f0',
        padding: 16,
    },
    card: {
        backgroundColor: '#fff',
        padding: 16,
        borderRadius: 8,
        marginVertical: 10,
        shadowColor: '#000',
        shadowOffset: { width: 0, height: 2 },
        shadowOpacity: 0.2,
        shadowRadius: 2,
        elevation: 2,
    },
    title: {
        fontSize: 24,
        fontWeight: 'bold',
        marginBottom: 10,
    },
    content: {
        fontSize: 16,
    },
});
