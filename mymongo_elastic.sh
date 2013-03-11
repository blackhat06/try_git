sudo apt-get update
sduo apt-get install openjdk-7-jre-headless -f
sudo apt-get install curl
sudo apt-get install unzip
sudo apt-get install openssh-server
sudo curl -OL http://github.com/downloads/elasticsearch/elasticsearch/elasticsearch-0.19.8.zip
sudo unzip elasticsearch-* && rm elasticsearch-*.zip
cd elasticsearch-0.19.8
sudo mkdir /usr/local/elasticsearch
#sudo mv /usr/local/elasticsearch 
