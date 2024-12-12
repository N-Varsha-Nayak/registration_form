# Use the official PHP image from the Docker Hub
FROM php:8.1-cli

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the local files into the container
COPY . /var/www/html

# Expose the port the app runs on
EXPOSE 10000

# Start the built-in PHP server
CMD ["php", "-S", "0.0.0.0:10000", "display.php"]
