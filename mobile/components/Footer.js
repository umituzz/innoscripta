import React from 'react';
import { View, Text, StyleSheet } from 'react-native';
import Constants from 'expo-constants';

const Footer = () => {
    const appName = Constants.name;

    return (
        <View style={styles.footerContainer}>
            <Text style={styles.footerText}>© {new Date().getFullYear()} {appName}</Text>
        </View>
    );
};

const styles = StyleSheet.create({
    footerContainer: {
        backgroundColor: 'blue',
        alignItems: 'center',
    },
    footerText: {
        color: '#fff',
    },
});

export default Footer;
