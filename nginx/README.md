# Nginx Configuration on a Linux Server

Use Nginx as a reverse proxy to serve the project on a Linux server with a domain name.

## 1. Create a new file lost-and-found in the /etc/nginx/sites-available directory:
```bash
$ sudo vim /etc/nginx/sites-available/lost-and-found
```

## 2. Add the following configuration:
```conf
# /etc/nginx/sites-available/lost-and-found

# Define a server block.
server {
    # Listen on port 80 (default HTTP port).
    listen 80;

    # Define the domain name.
    server_name lost-and-found.qingquanli.com;

    # Define the location of the project.
    location / {
        # The proxy_pass directive in Nginx is used to pass requests to another
        # server for processing and then return the response to the client.
        # It's a fundamental part of setting up Nginx as a reverse proxy.
        # Forward requests to the PHP app running inside the Apache server inside
        # the Docker container, which is mapped to port 8001 (host:container).
        proxy_pass http://localhost:8001;

        # Set the Host header of the forwarded request (the request sent to the PHP app)
        # to the host header of the original request (the request sent to Nginx), which is
        # the domain name typed in the browser.
        # This is necessary for the PHP app to generate correct URLs in the response.
        # `$host` is an Nginx built-in variable that contains the host name (domain name)
        # of the original request.
        proxy_set_header Host $host;

        # By default, Nginx does not forward the real IP address of the client (browser)
        # to the forwarded request (the request sent to the PHP app).
        # The application receiving the forwarded request (PHP) would see/think the proxy(Nginx)'s
        # IP address as the client IP, not the actual (real) client(browser)'s IP address.
        # Set the real IP address of the client in the forwarded request
        # to let the PHP know about the real IP address from the client.
        # `$remote_addr` is a built-in variable that contains the IP address of the client
        # that sent the request to the Nginx.
        proxy_set_header X-Real-IP $remote_addr;

        # Append the IP address of the client making the original request
        # to the `X-Forwarded-For` header of the forwarded request.
        # The value of the `X-Forwarded-For` header is a comma+space separated list of IP addresses.
        # `X-Forwarded-For` header is a de-facto standard header for identifying the originating
        # IP address of a client connecting to a web server through an HTTP proxy or load balancer.
        # `$proxy_add_x_forwarded_for` is a special Nginx built-in variable that represents
        # the client's IP address and any existing X-Forwarded-For IP addresses from the request.
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
    }

}
```

## 3. Create a symbolic link to the file in the /etc/nginx/sites-enabled directory:
```bash
$ sudo ln -s /etc/nginx/sites-available/lost-and-found /etc/nginx/sites-enabled/
```

## 4. Optional: Configure HTTPS

- Configure Let's Encrypt (certbot) in Nginx to enable HTTPS
