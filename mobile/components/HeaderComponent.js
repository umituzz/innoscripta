import React from 'react';
import { StyleSheet } from 'react-native';
import { Header } from 'react-native-elements';
import Menu from './Menu';

const HeaderComponent = () => {
    return (
        <Header
            containerStyle={styles.headerContainer}
            centerComponent={{ text: 'UmitUZ', style: { color: '#fff', fontSize: 18 } }}
            rightComponent={<Menu />}
        />
    );
};

const styles = StyleSheet.create({
    headerContainer: {
        backgroundColor: 'blue',
    },
});

export default HeaderComponent;
