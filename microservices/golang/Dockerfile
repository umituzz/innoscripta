FROM golang:alpine

ADD . /app

WORKDIR /app

RUN go build -o main .

CMD ["./main"]
