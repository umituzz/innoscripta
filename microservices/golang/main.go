package main

import (
    "context"
    "fmt"
    "log"
    "net/http"
    "time"

    "go.mongodb.org/mongo-driver/mongo"
    "go.mongodb.org/mongo-driver/mongo/options"
    "go.mongodb.org/mongo-driver/bson"
)

var (
    client        *mongo.Client
    collection    *mongo.Collection
    mongoURI      = "mongodb://localhost:27017"
    dbName        = "mongodb"
    collectionName = "logs"
)

func init() {
    clientOptions := options.Client().ApplyURI(mongoURI)
    var err error
    client, err = mongo.NewClient(clientOptions)
    if err != nil {
        log.Fatal(err)
    }

    ctx, cancel := context.WithTimeout(context.Background(), 10*time.Second)
    defer cancel()
    err = client.Connect(ctx)
    if err != nil {
        log.Fatal(err)
    }

    collection = client.Database(dbName).Collection(collectionName)
}

func main() {
    http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
        logEntry := bson.M{
            "timestamp": time.Now(),
            "message":   "A new request for / endpoint in GoLang project",
        }

        _, err := collection.InsertOne(context.Background(), logEntry)
        if err != nil {
            log.Println("Log could not save: ", err)
        }

        fmt.Fprintf(w, "Hello GoLang")
    })

    log.Fatal(http.ListenAndServe(":5000", nil))
}
