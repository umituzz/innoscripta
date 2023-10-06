FROM node:18-alpine

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY .env.example .env
COPY . .

CMD [ "npm", "run", "start" ]
