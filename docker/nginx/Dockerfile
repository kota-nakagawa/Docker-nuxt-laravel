FROM alpine:3.6

RUN apk update && \
    apk add --no-cache nginx

ADD ./default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

RUN mkdir -p /run/nginx

CMD nginx -g "daemon off;"
