# Setup Instructions 
# Application was tested on Ubuntu 24.04.3 LTS



## Step 1. Update System - if required

```bash
sudo apt update
sudo apt upgrade -y
```

## Step 2: Install Docker by running following commands

```bash
# Install required packages
sudo apt install -y apt-transport-https ca-certificates curl gnupg lsb-release

curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg

echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

sudo apt update

sudo apt install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

sudo usermod -aG docker $USER

```

## Step 3: Download Github repository with

Repository can be found at `https://github.com/jwatts84/build_challenge.git`
```bash
git clone https://github.com/jwatts84/build_challenge.git
```

## Step 4. Run Docker Compose 

```bash

# Run build from /noisy_ctf
cd noisy_ctf

docker compose up --build -d

```

```bash
# To shut down containers
docker compose down -v  
```

## Step 5: Access the Challenge

The challenge will be available at:
- **Web App**: http://localhost:8080



## Step 6: Run the Solve Script (Optional)


```bash
# run from the folder 
pin install requests, urllib.parse, time, base64
python3 ./solve_script.py
```





