FROM python:3.8-alpine

WORKDIR /app

COPY requirements.txt .
RUN pip install -r requirements.txt

COPY .env.example .env
COPY . .

EXPOSE 6000

CMD ["python", "app.py"]
