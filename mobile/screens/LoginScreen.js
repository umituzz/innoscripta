import React, {useState} from "react";
import {StyleSheet, View} from 'react-native';
import {Button, Input} from "react-native-elements";
import {useNavigation} from '@react-navigation/native';
import {useDispatch} from "react-redux";
import {setToken} from "../stores/actions/authAction";

export default function LoginScreen() {
    const navigation = useNavigation();
    const dispatch = useDispatch();
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleLogin = async () => {
        try {
            const response = await fetch('http://localhost/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    email: email,
                    password: password,
                }),
            });

            if (!response.ok) {
                console.log('Giriş başarısız.');
                return;
            }

            const data = await response.json();

            const token = data.data.token;

            dispatch(setToken(token));

            console.log('Token:', token);
            navigation.navigate('Home');
        } catch (error) {
            console.error('Hata:', error);
        }
    };


    return (
        <View style={styles.container}>
            <Input
                label="Email"
                placeholder="Enter Email"
                value={email}
                onChangeText={(text) => setEmail(text)}
                autoCapitalize="none"
            />
            <Input
                label="Password"
                placeholder="Enter Password"
                value={password}
                onChangeText={(text) => setPassword(text)}
                secureTextEntry
                autoCapitalize="none"
            />
            <Button
                title="Giriş Yap"
                onPress={handleLogin}
                containerStyle={styles.buttonContainer}
            />
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        justifyContent: 'center',
        padding: 16,
    },
    buttonContainer: {
        marginTop: 16,
    },
});
