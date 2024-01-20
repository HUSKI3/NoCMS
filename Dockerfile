# syntax=docker/dockerfile:1
FROM python:3.12.1-slim-bullseye

WORKDIR /app

COPY requirements.txt requirements.txt
RUN pip3 install -r requirements.txt

COPY . .

# CMD [ "python3", "-m" , "nophp", "./config/wool.yaml"]
# Webserver starts on http://127.0.0.1:8000
# But when used with docker compose, it will be exposed to the host system
# you can customize the behavior in docker-compose.yml