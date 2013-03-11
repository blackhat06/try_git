sudo apt-key adv --keyserver keyserver.ubuntu.com --recv 7F0CEB10
sudo echo "deb http://downloads-distro.mongodb.org/repo/ubuntu-upstart dist 10gen" >> /etc/apt/sources.list
sudo apt-key adv --keyserver keyserver.ubuntu.com --recv 7F0CEB10
sudo apt-get update
sudo apt-get install mongodb-10gen
sudo mkdir -p /data/r0
sudo mkdir -p /data/r1
sudo mkdir -p /data/r2
user=$(logname)
sudo chown $user /data/r0
sudo chown $user /data/r1
sudo chown $user /data/r2
sudo /usr/bin/mongod --replSet foo --port 27017 -fork --quiet --dbpath /data/r0 --logpath /var/log/mongodb0.log
 
sudo /usr/bin/mongod --replSet foo --port 27018 -fork --quiet --dbpath /data/r1 --logpath /var/log/mongodb1.log
 
sudo /usr/bin/mongod --replSet foo --port 27019 -fork --quiet --dbpath /data/r2 --logpath /var/log/mongodb2.log
