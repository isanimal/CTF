FROM nginx:alpine

RUN apk add --no-cache git

RUN mkdir -p /var/www/site && \
    cd /var/www/site && \
    git init . && \
    git config user.email "ctf@ngesec" && \
    git config user.name "Bimo Yudistira Ariel" && \
    echo '<!doctype html><meta charset="utf-8"><title>Ngesec</title><h1>Hello Hackers!</h1><p>Nothing to see here.</p>' > index.html && \
    mkdir -p assets && \
    echo '/* demo css */ body{font-family:system-ui,sans-serif}' > assets/style.css && \
    git add . && git commit -m "Initial public site" && \
    mkdir -p secrets && \
    echo 'CTF{d0nt_exp0s3d_yo00ur_git_h1story_8929927485}' > secrets/flag.txt && \
    echo 'Do not commit secrets!' > secrets/README.txt && \
    git add secrets && git commit -m "Add secrets (oops)" && \
    rm -rf secrets && \
    git add -A && git commit -m "Remove secrets from working tree" && \
    mkdir -p /usr/share/nginx/html && \
    cp -R /var/www/site/. /usr/share/nginx/html/

COPY default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
