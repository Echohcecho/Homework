FROM nginx:alpine

RUN mkdir /etc/nginx/conf

COPY nginx/conf/general.conf /etc/nginx/conf
COPY nginx/conf/security.conf /etc/nginx/conf
COPY nginx/default.conf /etc/nginx/conf.d

COPY ./public/ /srv/www/public
COPY ./src/ /srv/www/src
