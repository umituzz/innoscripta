import React from 'react';
import {Provider} from "react-redux";
import {NavigationContainer} from '@react-navigation/native';
import {createNativeStackNavigator} from '@react-navigation/native-stack';
import {ThemeProvider} from 'react-native-elements';
import MainLayout from "./layouts/MainLayout";
import HomeScreen from './screens/HomeScreen';
import LoginScreen from "./screens/LoginScreen";
import RegisterScreen from "./screens/RegisterScreen";
import ArticleDetailScreen from "./screens/ArticleDetailScreen";
import store from "./stores";
import {theme} from "./themeConfig";

const Stack = createNativeStackNavigator();

export default function App() {
    return (
        <Provider store={store}>
            <ThemeProvider theme={theme}>
                <NavigationContainer>
                    <Stack.Navigator initialRouteName="Home" screenOptions={{headerShown: false}}>
                        <Stack.Screen name="Main">
                            {props => (
                                <MainLayout>
                                    <Stack.Navigator initialRouteName="Home" screenOptions={{headerShown: false}}>
                                        <Stack.Screen name="HomeScreen" component={HomeScreen}/>
                                        <Stack.Screen name="LoginScreen" component={LoginScreen}/>
                                        <Stack.Screen name="RegisterScreen" component={RegisterScreen}/>
                                        <Stack.Screen name="ArticleDetailScreen" component={ArticleDetailScreen} />
                                    </Stack.Navigator>
                                </MainLayout>
                            )}
                        </Stack.Screen>
                    </Stack.Navigator>
                </NavigationContainer>
            </ThemeProvider>
        </Provider>
    );
}


