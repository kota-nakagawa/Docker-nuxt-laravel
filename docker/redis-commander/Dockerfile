FROM node:alpine

LABEL maintainer="Marc Lennox <marc.lennox@gmail.com>"

# Install node packages.
RUN npm install -g redis-commander
RUN echo '{}' > /root/.redis-commander

# Define the entrypoint script.
ENTRYPOINT ["redis-commander"]

# Expose ports.
EXPOSE 8080