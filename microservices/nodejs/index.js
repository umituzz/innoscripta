const express = require('express');
const {MongoClient} = require('mongodb');
require('dotenv').config();
const app = express();
const port = 4000;
const mongoUri = process.env.MONGO_DB_URL;
const dbName = process.env.MONGO_DB;
const collectionName = 'logs';

app.get('/', async (req, res) => {
    const client = new MongoClient(mongoUri);
    await client.connect();
    const db = client.db(dbName);
    const collection = db.collection(collectionName);
    const logEntry = {
        timestamp: new Date(),
        message: 'A new request for / endpoint in node.js project'
    };
    await collection.insertOne(logEntry);

    res.send('Hello, World!');
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
