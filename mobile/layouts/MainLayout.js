import React from 'react';
import { View, StyleSheet } from 'react-native';
import Footer from '../components/Footer';
import HeaderComponent from '../components/HeaderComponent';

const MainLayout = ({ children }) => {
    return (
        <View style={styles.container}>
            <HeaderComponent />
            <View style={styles.content}>{children}</View>
            <Footer />
        </View>
    );
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
    },
    content: {
        flex: 1,
        paddingHorizontal: 10,
    },
});

export default MainLayout;
