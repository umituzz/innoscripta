import React from 'react';
import { View, Text, TouchableOpacity } from 'react-native';
import { useNavigation } from '@react-navigation/native';

const Menu = () => {
    const navigation = useNavigation();

    const handleHome = () => {
        navigation.navigate('HomeScreen');
    };

    const handleLogin = () => {
        navigation.navigate('LoginScreen');
    };

    const handleRegister = () => {
        navigation.navigate('RegisterScreen');
    };

    return (
        <View style={{ flexDirection: 'row' }}>
            <TouchableOpacity onPress={handleHome}>
                <Text style={{ color: '#fff', marginHorizontal: 10 }}>Home</Text>
            </TouchableOpacity>
            <TouchableOpacity onPress={handleLogin}>
                <Text style={{ color: '#fff', marginHorizontal: 10 }}>Login</Text>
            </TouchableOpacity>
            <TouchableOpacity onPress={handleRegister}>
                <Text style={{ color: '#fff', marginHorizontal: 10 }}>Register</Text>
            </TouchableOpacity>
        </View>
    );
};

export default Menu;
