 FROM nginx:1.12

LABEL maintainer="Paul Redmond"

COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/conf.d/*.conf /etc/nginx/conf.d/

RUN rm /etc/nginx/conf.d/default.conf
COPY public/ /srv/app/public

