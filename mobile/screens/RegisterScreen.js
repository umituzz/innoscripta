import React, { useState } from "react";
import { StyleSheet, View } from "react-native";
import { Button, Input } from "react-native-elements";
import {useNavigation} from "@react-navigation/native";

export default function RegisterScreen() {
    const navigation = useNavigation();
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [passwordConfirmation, setPasswordConfirmation] = useState("");

    const handleRegister = async () => {
        try {
            const response = await fetch('http://localhost/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: passwordConfirmation,
                }),
            });

            if (!response.ok) {
                console.log('Giriş başarısız.');
                return;
            }

            navigation.navigate('Login');

        } catch (error) {
            console.error('Hata:', error);
        }

    };

    return (
        <View style={styles.container}>
            <Input
                name="name"
                label="Name"
                placeholder="Adınızı girin"
                value={name}
                onChangeText={(text) => setName(text)}
                autoCapitalize="words"
            />
            <Input
                name="email"
                label="Email"
                placeholder="Email adresinizi girin"
                value={email}
                onChangeText={(text) => setEmail(text)}
                autoCapitalize="none"
                keyboardType="email-address"
            />
            <Input
                name="password"
                label="Password"
                placeholder="Şifrenizi girin"
                value={password}
                onChangeText={(text) => setPassword(text)}
                secureTextEntry
                autoCapitalize="none"
            />
            <Input
                name="password_confirmation"
                label="Password Confirmation"
                placeholder="Şifreyi doğrulayın"
                value={passwordConfirmation}
                onChangeText={(text) => setPasswordConfirmation(text)}
                secureTextEntry
                autoCapitalize="none"
            />
            <Button
                title="Kayıt Ol"
                onPress={handleRegister}
                containerStyle={styles.buttonContainer}
            />
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        justifyContent: "center",
        padding: 16,
    },
    buttonContainer: {
        marginTop: 16,
    },
});
