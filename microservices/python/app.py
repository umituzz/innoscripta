from flask import Flask
from pymongo import MongoClient
from datetime import datetime

app = Flask(__name__)

mongo_uri = "mongodb://localhost:27017"
db_name = "mongodb"
collection_name = "logs"
client = MongoClient(mongo_uri)
db = client[db_name]
collection = db[collection_name]

@app.route('/')
def hello_world():
    log_entry = {
        "timestamp": datetime.now(),
        "message": "A new request for / endpoint in Python Flask project"
    }

    collection.insert_one(log_entry)

    return 'Hello, World!'

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=8085)
